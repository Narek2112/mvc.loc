<?php
namespace Core\Framework;

class Router
{
    const CONTROLLER_NAMESPACE = 'App\Controllers';
    private static $routes = [];
    private static $route  = [];


    public static function get($path,$frameActions)
    {

        $data = explode('@',$frameActions);
        $route = [
            'controller' => $data[0],
            'action'     => $data[1] ?? 'index',
            'method'     => 'GET',
            'path'       => $path
        ];
        self::$routes[] = $route;
    }
    public static function post($path,$frameActions)
    {
        $data = explode('@',$frameActions);
        $route = [
            'controller' => $data[0],
            'action'     => $data[1] ?? 'index',
            'method'      => 'POST',
            'path'       => $path

        ];
        self::$routes[] = $route;
    }

    public static function matchRoute($path,$requestMethod)
    {

        $path = self::removeQueryString($path);
        foreach (self::$routes as $route){

            if ($route['path'] == $path && $route['method'] == $requestMethod){
                    self::$route = $route;
                    return true;
               }else{
                   preg_match_all('/\{(.*?)\}/', $route['path'],$matches);

                   if (!empty($matches)){
                       $args = $matches[1];
                       $routeParts = explode('/',$route['path']);
                       $indexes = [];
                       foreach ($matches[0] as $i => $match){
                           $indexes[] = array_search($match,$routeParts);
                       }
                       $uriParts = explode('/',$path);
                       foreach ($args as $i => $arg){
                           $route['params'][$arg] = $uriParts[$indexes[$i]];
                       }
                       foreach ($matches[0] as $i => $match){
                           $route['path'] = str_replace($match,$route['params'][$args[$i]],$route['path']);
                       }

                       if (rtrim($route['path'],'/').'/' == rtrim($path,'/').'/' && $requestMethod == $route['method']){

                           self::$route = $route;
                           return true;
                       }
                   }
               }
        }

        return false;
    }

    public static function run()
    {
        $class = self::CONTROLLER_NAMESPACE.'\\'.self::$route['controller'];
        if (class_exists($class)){
            $controllerObject = new $class();
            if (method_exists($controllerObject,self::$route['action'])){
                $request = new Request($_REQUEST,$_FILES,$_SERVER);
                if (isset(self::$route['params'])){
                    $controllerObject->{self::$route['action']}(...array_values(self::$route['params']),...[$request]);
                }else{
                    $controllerObject->{self::$route['action']}($request);
                }
            }else{
                abort("Method ".self::$route['action']." does not exists in ". self::$route['controller']." controller");
            }
        }else{
            abort(self::$route['controller']." controller does not exists");
        }
    }

    public static function removeQueryString ($url)
    {
        return explode('&',$url,2)[0];
    }
}
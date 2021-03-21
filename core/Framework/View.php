<?php


namespace Core\Framework;


class View
{
    const VIEW_PATH = APP.'/views';
    const LAYOUT_PATH = APP.'/views/layouts';

    public static function render($viewPath,$data = [],$layout = '')
    {
        $path = str_replace('.','/',$viewPath);
        $errors = null;
        if (isset($_SESSION['errors'])){
            $errors = $_SESSION['errors'];
        }
        if (is_file(self::VIEW_PATH.'/'.$path.'.php')){
            extract($data);
            ob_start();
            require_once self::VIEW_PATH.'/'.$path.'.php';
            $content = ob_get_clean();
            unset($_SESSION['errors']);
        }else{
            abort("self::VIEW_PATH.'/'.$path.'.php' not found");
        }

        if ($layout != '')
        {
            $layoutPath = str_replace('.','/',$layout);
            if (is_file(self::LAYOUT_PATH.'/'.$layoutPath.'.php')){
                require_once self::LAYOUT_PATH.'/'.$layoutPath.'.php';
            }else{
                abort("self::LAYOUT_PATH.'/'.$layoutPath.'.php' not found");
            }
        }else{
            echo $content;
        }
    }
}
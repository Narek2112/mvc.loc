<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8d4bf0df47bdb48fc9b77c6b8720eb11
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8d4bf0df47bdb48fc9b77c6b8720eb11::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8d4bf0df47bdb48fc9b77c6b8720eb11::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8d4bf0df47bdb48fc9b77c6b8720eb11::$classMap;

        }, null, ClassLoader::class);
    }
}

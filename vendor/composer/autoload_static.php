<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit795698b1f44c2eb7ef98e04034793a52
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit795698b1f44c2eb7ef98e04034793a52::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit795698b1f44c2eb7ef98e04034793a52::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit795698b1f44c2eb7ef98e04034793a52::$classMap;

        }, null, ClassLoader::class);
    }
}

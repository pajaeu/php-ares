<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit57528fab5cc9ca713434a0c4cf722b56
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Ares\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ares\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Ares',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit57528fab5cc9ca713434a0c4cf722b56::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit57528fab5cc9ca713434a0c4cf722b56::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit57528fab5cc9ca713434a0c4cf722b56::$classMap;

        }, null, ClassLoader::class);
    }
}

<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit03230174b1da6da9f048a359bca614de
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'classes\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit03230174b1da6da9f048a359bca614de::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit03230174b1da6da9f048a359bca614de::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
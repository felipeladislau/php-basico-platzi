<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit98c957873eec3e7fc59142fb8cab66e8
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit98c957873eec3e7fc59142fb8cab66e8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit98c957873eec3e7fc59142fb8cab66e8::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}

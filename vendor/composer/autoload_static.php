<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit721e317e42c1d612868b6f13ce17aea1
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Bitm\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Bitm\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit721e317e42c1d612868b6f13ce17aea1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit721e317e42c1d612868b6f13ce17aea1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit721e317e42c1d612868b6f13ce17aea1::$classMap;

        }, null, ClassLoader::class);
    }
}
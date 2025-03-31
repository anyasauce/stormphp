<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit25ceffe8f05982ddeed5f41c83580a39
{
    public static $prefixLengthsPsr4 = array (
        'e' => 
        array (
            'eftec\\bladeone\\' => 15,
        ),
        'J' => 
        array (
            'Josiahdev\\StormphpInstaller\\' => 28,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'eftec\\bladeone\\' => 
        array (
            0 => __DIR__ . '/..' . '/eftec/bladeone/lib',
        ),
        'Josiahdev\\StormphpInstaller\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit25ceffe8f05982ddeed5f41c83580a39::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit25ceffe8f05982ddeed5f41c83580a39::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit25ceffe8f05982ddeed5f41c83580a39::$classMap;

        }, null, ClassLoader::class);
    }
}

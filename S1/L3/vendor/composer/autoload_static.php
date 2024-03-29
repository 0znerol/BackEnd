<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitccc357da3f59be21f66260ec9e1e0f53
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitccc357da3f59be21f66260ec9e1e0f53::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitccc357da3f59be21f66260ec9e1e0f53::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitccc357da3f59be21f66260ec9e1e0f53::$classMap;

        }, null, ClassLoader::class);
    }
}

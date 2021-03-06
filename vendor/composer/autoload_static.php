<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit31204c6bd5539a88c2f3e38e2d25fb38
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit31204c6bd5539a88c2f3e38e2d25fb38::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit31204c6bd5539a88c2f3e38e2d25fb38::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit31204c6bd5539a88c2f3e38e2d25fb38::$classMap;

        }, null, ClassLoader::class);
    }
}

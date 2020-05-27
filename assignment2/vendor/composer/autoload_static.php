<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfebd02b31d255e0f0533719a5174f58e
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfebd02b31d255e0f0533719a5174f58e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfebd02b31d255e0f0533719a5174f58e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
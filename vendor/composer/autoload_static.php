<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit30754a311ce53aa523973a31d8c9fd3b
{
    public static $files = array (
        'decc78cc4436b1292c6c0d151b19445c' => __DIR__ . '/..' . '/phpseclib/phpseclib/phpseclib/bootstrap.php',
        'acfef0656c6a15bf7871bb793227dcdd' => __DIR__ . '/../..' . '/Crypter.php',
    );

    public static $prefixLengthsPsr4 = array (
        'p' => 
        array (
            'phpseclib\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'phpseclib\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpseclib/phpseclib/phpseclib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit30754a311ce53aa523973a31d8c9fd3b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit30754a311ce53aa523973a31d8c9fd3b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
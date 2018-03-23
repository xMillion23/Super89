<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0dd4fb3a48adb061334a94249e3bac1b
{
    public static $files = array (
        'd5e184bb3537ab5eb44dbd1454cfd70b' => __DIR__ . '/..' . '/hoa/core/Core.php',
    );

    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Longman\\TelegramBot\\' => 20,
        ),
        'H' => 
        array (
            'Hoa\\Visitor\\' => 12,
            'Hoa\\Ustring\\' => 12,
            'Hoa\\Stream\\' => 11,
            'Hoa\\Regex\\' => 10,
            'Hoa\\Math\\' => 9,
            'Hoa\\Iterator\\' => 13,
            'Hoa\\File\\' => 9,
            'Hoa\\Core\\' => 9,
            'Hoa\\Compiler\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Longman\\TelegramBot\\' => 
        array (
            0 => __DIR__ . '/..' . '/longman/telegram-bot/src',
        ),
        'Hoa\\Visitor\\' => 
        array (
            0 => __DIR__ . '/..' . '/hoa/visitor',
        ),
        'Hoa\\Ustring\\' => 
        array (
            0 => __DIR__ . '/..' . '/hoa/ustring',
        ),
        'Hoa\\Stream\\' => 
        array (
            0 => __DIR__ . '/..' . '/hoa/stream',
        ),
        'Hoa\\Regex\\' => 
        array (
            0 => __DIR__ . '/..' . '/hoa/regex',
        ),
        'Hoa\\Math\\' => 
        array (
            0 => __DIR__ . '/..' . '/hoa/math',
        ),
        'Hoa\\Iterator\\' => 
        array (
            0 => __DIR__ . '/..' . '/hoa/iterator',
        ),
        'Hoa\\File\\' => 
        array (
            0 => __DIR__ . '/..' . '/hoa/file',
        ),
        'Hoa\\Core\\' => 
        array (
            0 => __DIR__ . '/..' . '/hoa/core',
        ),
        'Hoa\\Compiler\\' => 
        array (
            0 => __DIR__ . '/..' . '/hoa/compiler',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0dd4fb3a48adb061334a94249e3bac1b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0dd4fb3a48adb061334a94249e3bac1b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
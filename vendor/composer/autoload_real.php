<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit013ad2d0bdceb11d91b517f85cf24e20
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit013ad2d0bdceb11d91b517f85cf24e20', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit013ad2d0bdceb11d91b517f85cf24e20', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit013ad2d0bdceb11d91b517f85cf24e20::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}

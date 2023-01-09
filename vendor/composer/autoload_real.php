<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitf4a50bf8edfa730cec3f5d46608cb7a8
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

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitf4a50bf8edfa730cec3f5d46608cb7a8', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitf4a50bf8edfa730cec3f5d46608cb7a8', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitf4a50bf8edfa730cec3f5d46608cb7a8::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}

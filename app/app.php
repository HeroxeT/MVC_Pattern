<?php


class App
{

    public static $router;

    public static $db;

    public static $kernel;

    public static function init()
    {
        spl_autoload_register(['static', 'loadClass']);
        static::bootstrap();
    }

    public static function bootstrap()
    {
        static::$router = new \Base\Router();
        static::$db = new \Base\Db();
        static::$kernel = new Kernel();

    }

    public static function loadClass($className)
    {

        $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        require_once ROOTPATH . '\\'. $className . '.php';

    }

    public function handleException(Throwable $e)
    {

        if ($e instanceof \App\Exceptions\InvalidRouteException) {
            echo static::$kernel->launchAction('Error', 'error404', [$e]);
        } else {
            echo static::$kernel->launchAction('Error', 'error500', [$e]);
        }

    }

}

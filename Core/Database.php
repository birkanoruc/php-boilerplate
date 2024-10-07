<?php

namespace Core;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Database
{
    function __construct()
    {
        $capsule = new Capsule;
        $capsule->addConnection([
            'driver' => env("DB_CONNECTION", "mysql"),
            'host' => env("DB_HOST", "localhost"),
            'database' => env("DB_NAME", "php_boilerplate"),
            'username' => env("DB_USERNAME", "root"),
            'password' => env("DB_PASSWORD", ""),
            'charset' => env("DB_CHARSET", "utf8"),
            'collation' => 'utf8_general_ci',
            'prefix' => '',
        ]);
        $capsule->setEventDispatcher(new Dispatcher(new Container));

        $capsule->setAsGlobal();

        $capsule->bootEloquent();
    }
}

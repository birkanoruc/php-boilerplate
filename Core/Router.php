<?php

namespace Core;

use Pecee\SimpleRouter\SimpleRouter;
use Core\CsrfVerifier;

class Router extends SimpleRouter
{
    public static function start(): void
    {
        self::csrfVerifier(new CsrfVerifier());
        require_once 'App/Routes.php';
        parent::setDefaultNamespace('\App\Controllers');
        parent::start();
    }
}

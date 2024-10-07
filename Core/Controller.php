<?php

namespace Core;

use Windwalker\Edge\Edge;
use Windwalker\Edge\Loader\EdgeFileLoader;
use App\Helpers\AuthHelper;

class Controller
{
    public function view($view, $data = [])
    {
        $paths = array("App/Views");
        $edge = new Edge(new EdgeFileLoader($paths));
        $edge->addGlobal('user', AuthHelper::user());
        echo $edge->render($view, $data);
    }
}

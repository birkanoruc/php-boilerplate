<?php

namespace App\Controllers;

use Core\Controller;

class ErrorController extends Controller
{
    public function notfound()
    {
        $this->view('errors.notfound');
    }
    public function forbidden()
    {
        $this->view('errors.forbidden');
    }
}

<?php

namespace App\Middlewares;

use App\Models\User;
use App\Helpers\Session;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class Guest implements IMiddleware
{
    public function handle(Request $request): void
    {
        if (!Session::has("email") && !Session::has("password")) {
            return;
        }
        $request->setRewriteUrl(url('home'));
    }
}

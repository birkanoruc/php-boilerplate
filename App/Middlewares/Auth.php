<?php

namespace App\Middlewares;

use App\Models\User;
use App\Helpers\Session;
use App\Helpers\AuthHelper;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class Auth implements IMiddleware
{
    public function handle(Request $request): void
    {
        if (AuthHelper::user()) {
            return;
        }

        $request->setRewriteUrl(url('auth.login'));
    }
}

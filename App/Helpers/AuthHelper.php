<?php

namespace App\Helpers;

use App\Models\User;
use App\Helpers\Session;

class AuthHelper
{
    public static function user()
    {
        if (Session::has("email") && Session::has("password")) {
            return User::where("email", "=", Session::get("email"))->where("password", "=", Session::get("password"))->first();
        }
        return false;
    }
}

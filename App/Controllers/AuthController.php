<?php

namespace App\Controllers;

use Core\Controller;
use Core\Validation;
use Respect\Validation\Validator;
use App\Models\User;
use App\Helpers\Session;

class AuthController extends Controller
{
    public function login()
    {
        $this->view('auth.login');
    }

    public function attemp($email = null, $password = null)
    {
        if ($email === null && $password === null) {
            $input = input()->all();

            $errors = Validation::validate($input, [
                'email' => Validator::email(),
                'password' => Validator::notEmpty()->length(6, null),
            ]);

            if (!empty($errors)) {
                return $this->view("auth.login", ["errors" => $errors, "input" => $input]);
            }

            $email = $input["email"];
            $password = md5($input["password"]);
        }

        $control = User::where("email", "=", $email)->where("password", "=", $password)->count();

        if (!$control) {
            return withResponse("danger", "Email or password is incorrect.")->redirect(url("profile"));
        }

        Session::put("email", $email);
        Session::put("password", $password);
        return withResponse("success", "Login successfully.")->redirect(url("home"));
    }

    public function register()
    {
        $this->view("auth.register");
    }

    public function store()
    {
        $input = input()->all();

        $errors = Validation::validate($input, [
            'name' => Validator::notEmpty()->length(1, 30),
            'email' => Validator::email(),
            'password' => Validator::notEmpty()->length(6, 30),
        ]);

        if (!empty($errors)) {
            return $this->view("auth.register", ["errors" => $errors, "input" => $input]);
        }

        $input["password"] = md5($input["password"]);

        User::create($input);
        $this->attemp($input["email"], $input["password"]);
    }

    public function logout()
    {
        Session::destroy();
        return response()->redirect(url("home"));
    }
}

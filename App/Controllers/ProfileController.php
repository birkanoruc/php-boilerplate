<?php

namespace App\Controllers;

use Core\Controller;
use Core\Validation;
use Respect\Validation\Validator;
use App\Helpers\AuthHelper;
use App\Helpers\Session;

class ProfileController extends Controller
{
    public function index()
    {
        $this->view('profile.index');
    }

    public function password()
    {
        $input = input()->all();

        $errors = Validation::validate($input, [
            'current_password' => Validator::notEmpty()->length(6, 30),
            'new_password' => Validator::notEmpty()->length(6, null)->setName("New Password"),
            'confirm_password' => Validator::equals($input['new_password'])->setName('Confirm Password')
        ]);

        if (!empty($errors)) {
            return $this->view("profile.index", ["errors" => $errors, "input" => $input]);
        }

        $user = AuthHelper::user();

        if (md5($input['current_password']) != $user->password) {
            return withResponse("danger", "Current password is incorrect.")->redirect(url("profile"));
        }

        $user->password = md5($input['new_password']);
        $user->save();

        Session::destroy();

        return withResponse("success", "Password updated successfully.")->redirect(url("home"));
    }

    public function information()
    {
        $input = input()->all();

        $errors = Validation::validate($input, [
            'name' => Validator::notEmpty()->length(1, 30),
            'email' => Validator::email(),
        ]);

        if (!empty($errors)) {
            return $this->view("profile", ["errors" => $errors, "input" => $input]);
        }

        $user = AuthHelper::user();

        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->save();

        return withResponse("success", "Information updated successfully.")->redirect(url("profile"));
    }
    public function delete()
    {
        $user = AuthHelper::user();

        $user->delete();

        Session::destroy();

        return withResponse('success', 'Account deleted successfully.')->redirect(url('auth.login'));
    }
}

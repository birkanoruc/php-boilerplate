<?php

use Core\Router;
use Pecee\Http\Request;

use App\Controllers\AuthController;
use App\Controllers\ErrorController;
use App\Controllers\HomeController;
use App\Controllers\ProfileController;
use App\Middlewares\Auth;
use App\Middlewares\Guest;

Router::get('/', [HomeController::class, 'index'])->name("home");

Router::group(
    ['middleware' => Guest::class],
    function () {
        Router::get("/auth/login", [AuthController::class, "login"])->name("auth.login");
        Router::post("/auth/login", [AuthController::class, "attemp"])->name("auth.login.attemp");
        Router::get("/auth/register", [AuthController::class, "register"])->name("auth.register");
        Router::post("/auth/register", [AuthController::class, "store"])->name("auth.register.store");
    }
);

Router::group(
    ['middleware' => Auth::class],
    function () {
        Router::get('/profile', callback: [ProfileController::class, 'index'])->name("profile");
        Router::put('/profile/information', callback: [ProfileController::class, 'information'])->name("profile.update.information");
        Router::put('/profile/password', callback: [ProfileController::class, 'password'])->name("profile.update.password");
        Router::delete('/profile', callback: [ProfileController::class, 'delete'])->name("profile.delete");
        Router::match(['get', 'post'], '/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
    }
);

Router::get('/errors/notfound', [ErrorController::class, 'notfound'])->name("errors.notfound");
Router::get('/errors/forbidden', [ErrorController::class, 'forbidden'])->name("errors.forbidden");

Router::error(function (Request $request, \Exception $exception) {
    switch ($exception->getCode()) {
        case 404:
            response()->httpCode(403)->redirect('/errors/notfound');
        case 403:
            response()->httpCode(404)->redirect('/errors/forbidden');
    }
});

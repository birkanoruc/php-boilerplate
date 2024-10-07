<?php

use App\Helpers\Session;

if (!function_exists("assets")) {
    function assets($path)
    {
        return rtrim(env("APP_URL"), '/') . "/public/" . ltrim($path, '/');
    }
}

if (!function_exists("withErrors")) {
    /**
     * Store errors in the session and redirect.
     *
     * @param array $errors
     * @return \Pecee\Http\Response
     */
    function withErrors(array $errors): \Pecee\Http\Response
    {
        Session::flash('errors', $errors);
        return response();
    }
}

if (!function_exists("withSuccess")) {
    /**
     * Store success in the session and redirect.
     *
     * @param string $message
     * @return \Pecee\Http\Response
     */
    function withSuccess(string $message): \Pecee\Http\Response
    {
        Session::flash('success', $message);
        return response();
    }
}

if (!function_exists("withResponse")) {
    /**
     * Store $key in the session and redirect.
     *
     * @param string $key
     * @param string $value
     * @return \Pecee\Http\Response
     */
    function withResponse($key, $value): \Pecee\Http\Response
    {
        Session::flash($key, $value);
        return response();
    }
}

if (!function_exists('dd')) {
    function dd(...$vars)
    {
        foreach ($vars as $var) {
            echo '<pre>';
            var_dump($var);
            echo '</pre>';
        }

        die();
    }
}

if (!function_exists("flash")) {
    function flash($key)
    {
        if (Session::has($key)) {
            $flash = Session::get($key);
            Session::unflash($key);
            return $flash;
        };
    }
}

if (!function_exists("is_flash")) {
    function is_flash($key)
    {
        return Session::has($key) ? true : false;
    }
}

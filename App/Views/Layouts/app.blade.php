<!DOCTYPE html>
<html lang="{{ env('APP_LOCALE') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'PHP Boilerplate')</title>
    <link rel="stylesheet" href="{{ assets('/assets/bootstrap/css/bootstrap.min.css') }}">
</head>

<body class="container bg-body-tertiary">
    @include('layouts.nav')
    @include('layouts.flash')
    @yield('content')
    <script src="{{ assets('/assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>

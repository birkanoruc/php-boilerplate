<?php

namespace Core;

use Pecee\Http\Middleware\BaseCsrfVerifier;

class CsrfVerifier extends BaseCsrfVerifier
{
    protected array $except = [
        '/api/*',
    ];

    public function handleInvalidToken(\Pecee\Http\Request $request): void
    {
        response()->httpCode(403)->redirect('/error/forbidden');
    }
}

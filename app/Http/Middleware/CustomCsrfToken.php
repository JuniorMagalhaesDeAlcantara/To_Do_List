<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class CustomCsrfToken extends Middleware
{
    protected $except = [
        'tasks',
        'tasks/*',
    ];

    public function handle($request, Closure $next)
    {
        if ($this->inExceptArray($request)) {
            return $next($request);
        }

        return parent::handle($request, $next);
    }
}

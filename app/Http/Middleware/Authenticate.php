<?php

namespace App\Http\Middleware;
use Illuminate\Support\Str;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if (Str::contains($request->path(), 'api')) {
                return route('ecommerce.login');
            } else {
                return route('login');
            }
            
        }
    }
}

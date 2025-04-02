<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo(Request $request): ?string
    {
        // Check if the request expects a JSON response.
        if (! $request->expectsJson()) {
            // If it's not a JSON request, redirect to the 'login' named route.
            return route('login_page');
            return route('signup_page');
        }

        // If it's a JSON request, return null, indicating no redirection.
        return null;
    }
}
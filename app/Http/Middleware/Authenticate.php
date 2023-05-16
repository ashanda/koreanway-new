<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
{
    if (! $request->expectsJson()) {
        $guard = $request->route()->getAction('guard');

        switch ($guard) {
            case 'teacher':
                return route('teacher_login');
                break;
            case 'admin':
                return route('admin_login');
                break;
            default:
                return route('student_login');
        }
    }
}
}

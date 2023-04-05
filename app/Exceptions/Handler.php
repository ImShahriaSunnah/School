<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Auth;
class Handler extends ExceptionHandler
{
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        if ($request->is('admin') || $request->is('admin/*')) {
            return redirect()->guest('/login/admin');
        }
        if ($request->is('schools') || $request->is('schools/*')) {
            return redirect()->guest('/login/schools');
        }
        if ($request->is('teachers') || $request->is('teachers/*')) {
            return redirect()->guest('/login/teachers');
        }
        return redirect()->guest(route('login'));
    }
}

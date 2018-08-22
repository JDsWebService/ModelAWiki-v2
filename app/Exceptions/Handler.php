<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }

    /**
    * Convert an authentication exception into an unauthorized response
    *
    * @param \Illuminate\Http\Request   $request
    * @param \Illuminate\Auth\AuthenticationException   $exception
    * @param \Illuminate\Http\Response
    */
    protected function unauthenticated($request, AuthenticationException $exception) {
        // If this an an API request
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        // Give us the string of the guard being used in the exception
        $guard = array_get($exception->guards(), 0);

        // Switch on the guard
        switch ($guard) {
            case 'admin':
                $login = 'admin.login';
                break;
            default:
                $login = 'login';
                break;
        }

        // Redirect to the correct login
        return redirect()->guest(route($login));
    }
}

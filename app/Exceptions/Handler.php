<?php

namespace App\Exceptions;

use Exception;
use Throwable;
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
    public function report(Throwable $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $e)
    {
    //      if ($e instanceof \Illuminate\Auth\AuthenticationException) {
    //     return response()->json([
    //         'error' => 'Unauthenticated.'
    //     ], 401);
    // }

    if ($e instanceof \Illuminate\Auth\AuthenticationException) {
    if ($request->expectsJson()) {
        return response()->json(['error' => 'Unauthenticated.'], 401);
    }

    return redirect('/login'); // or '/superadmin/login' for superadmin routes
}

    // Handle 404 for API routes
    if ($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
        return response()->json([
            'error' => 'Resource not found.'
        ], 404);
    }

    // Handle other exceptions for API
    if ($request->is('api/*')) {
        return response()->json([
            'error' => $e->getMessage(),
        ], $this->isHttpException($e) ? $e->getStatusCode() : 500);
    }

    return parent::render($request, $e);
    }
}

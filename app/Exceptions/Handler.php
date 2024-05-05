<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;


class Handler extends ExceptionHandler
{
    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Exception $exception
     * @return Response
     * @throws Throwable
     */
    public function render($request, Exception $exception): Response
    {
        if ($exception instanceof \Illuminate\Validation\ValidationException) {
            // Handle validation errors here
            return response()->json(['error' => $exception->validator->errors()], 422);
        }

        return parent::render($request, $exception);
    }
}


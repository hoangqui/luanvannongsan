<?php

namespace App\Exceptions;

use Exception;
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
        if($this->isHttpException($exception))
        {
            switch ($exception->getStatusCode()) {
                case 404:
                    if (request()->is('admin/*') ) {
                        return response()->view('Backend.Errors.page_404',[],404);
                    } else {
                        return response()->view('Frontend.Errors.page_404',[],404);
                    }
                break;
                case 403:
                    if (request()->is('admin/*') ) {
                        return response()->view('Backend.Errors.page_403',[], 403);
                    } else {
                        return response()->view('Frontend.Errors.page_403',[], 403);
                    }
                case 500: 
                    if (request()->is('admin/*') ) {
                        return response()->view('Backend.Errors.page_500',[], 500);
                    } else {
                        return response()->view('Frontend.Errors.page_500',[], 500);
                    }
                default:
                    return $this->renderHttpException($exception);
                break;
            }
        }

        // if ($exception instanceof \ErrorException) {
        //     if (request()->is('admin/*') ) {
        //          return response()->view('Backend.Errors.page_500', [], 500);
        //     } else {
        //         return response()->view('Frontend.Errors.page_500', [], 500);
        //     }
           
        // } else {
        //     return parent::render($request, $exception);
        // }
        return parent::render($request, $exception);
    }
}

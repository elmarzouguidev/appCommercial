<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Str;
use Swift_TransportException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {

        });
    }

    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    public function render($request, Throwable $exception)
    {
        /*if ($exception instanceof \ErrorException) {
             return response()->json([
                 'data' => 'Resource not found'
             ], 404);
         }*/
        /* if ($exception instanceof ModelNotFoundException) {
               return response()->json([
                   'data' => 'Resource not found'
               ], 404);
           }*/

        /* if ($exception instanceof InvalidFilterQuery) {
                   return response()->json([
                       'data' => 'Resource not found'
                   ], 404);
         }*/
        if ($exception instanceof Swift_TransportException) {

            // dd($exception->getMessage(),'--',$exception);

            $contains = Str::contains($exception->getMessage(), ['could not be established with host', ':stream_socket_client():']);

            $contains ? $message = "désole nous avons un problème au niveau du serveur mailing" : $message = $exception->getMessage();

            return response()->json(['_response' => ['msg' => $message, 'is_send' => false]], 500);
        }

        if (request()->is('api/*')) {

            if ($exception instanceof MethodNotAllowedHttpException) {
                return response()->json([
                    'msg' => ['error' => 'sorry this URL is not Allowed from Browser Directly']
                ], 405);
            }

            /* if ($exception instanceof NotFoundHttpException) {

                return redirect()->route('home');
            }*/
        }

        return parent::render($request, $exception);
    }
}

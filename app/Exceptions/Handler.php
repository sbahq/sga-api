<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Contracts\Container\BindingResolutionException;
use BadMethodCallException;
use ErrorException;
use Error;
use App\Exceptions\CustomException;
use PagarMe\Exceptions\PagarMeException;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    private function showMessage($e, $message, $request){
        if( isset($request['show-detail-error']) )
            return ['message' => array(
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'message' => $e->getMessage()
            )];
        else
            return ['message' => $message];
    }

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
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
            //
        });

        $this->renderable(function (MethodNotAllowedHttpException $e, $request) {
            $message = $this->showMessage($e, $e->getMessage(), $request);
            $response = \App\Domains\Validations\Validation::instance()->getErrorMessage($message);
            return response()->json($response,500);
        });

        $this->renderable(function (NotFoundHttpException $e, $request) {
            $message = ['message' => 'Route not found.'];
            $response = \App\Domains\Validations\Validation::instance()->getErrorMessage($message);
            return response()->json($response,404);
        });

        $this->renderable(function (BadMethodCallException $e, $request) {
            $message = $this->showMessage($e, 'Resource not found.', $request);
            $response = \App\Domains\Validations\Validation::instance()->getErrorMessage($message);
            return response()->json($response,500);
        });

        $this->renderable(function (QueryException $e, $request) {
            $message = $this->showMessage($e, 'Ocorreu um erro de SQL, favor contactar a SBA.', $request);
            $response = \App\Domains\Validations\Validation::instance()->getErrorMessage($message);
            return response()->json($response,500);
        });

        $this->renderable(function (ErrorException $e, $request) {
            $message = $this->showMessage($e, $e->getMessage(), $request);
            $response = \App\Domains\Validations\Validation::instance()->getErrorMessage($message);
            return response()->json($response,500);
        });

        $this->renderable(function (Error $e, $request) {
            $message = $this->showMessage($e, $e->getMessage(), $request);
            $response = \App\Domains\Validations\Validation::instance()->getErrorMessage($message);
            return response()->json($response,500);
        });
        
        $this->renderable(function (ConnectionException $e, $request) {
            $message = $this->showMessage($e, $e->getMessage(), $request);
            $response = \App\Domains\Validations\Validation::instance()->getErrorMessage($message);
            return response()->json($response,500);
        });

        $this->renderable(function (BindingResolutionException $e, $request) {
            $message = $this->showMessage($e, $e->getMessage(), $request);
            $response = \App\Domains\Validations\Validation::instance()->getErrorMessage($message);
            return response()->json($response,500);
        });

        $this->renderable(function (CustomException $e, $request) {
            $message = $this->showMessage($e, $e->getMessage(), $request);          
            $response = \App\Domains\Validations\Validation::instance()->getErrorMessage($message);
            return response()->json($response,500);
        });

    }
}

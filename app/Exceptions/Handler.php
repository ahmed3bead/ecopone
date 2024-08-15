<?php

namespace App\Exceptions;

use App\BaseCode\Http\MunjzRequest;
use App\CouponApp\BaseCode\Requests\BaseRequest;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\CssSelector\Exception\InternalErrorException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        if (request()->is('api*')) {
            $this->renderable(function (ModelNotFoundException $e, Request $request) {

                return response()->json([
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                ], 404);

            });

            $this->renderable(function (MethodNotAllowedHttpException $e, Request $request) {

                return response()->json([
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                ], 404);

            });

            $this->renderable(function (NotFoundHttpException $e, Request $request) {

                return response()->json([
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                ], 404);

            });

            $this->renderable(function (RouteNotFoundException $e, Request $request) {

                return response()->json([
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                ], 404);


            });
            $this->renderable(function (AuthenticationException $e, Request $request) {

                return response()->json([
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                ], 401);


            });
            $this->renderable(function (ValidationException $e, Request $request) {

                return response()->json([
                    'message' => BaseRequest::validateRequest($e->validator),
                    'code' => $e->getCode(),
                ], 422);


            });
            $this->renderable(function (InternalErrorException $e, Request $request) {

                return response()->json([
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                ], 500);


            });

            $this->renderable(function (QueryException $e, Request $request) {

                return response()->json([
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                ], 500);


            });
        } else {
            $this->reportable(function (Throwable $e) {
                //
            });
        }

    }

}

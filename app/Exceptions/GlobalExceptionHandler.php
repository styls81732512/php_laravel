<?php

namespace App\Exceptions;

use App\Traits\ApiResponseTrait; //引用特徵
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response; //引用網址不允許此動詞
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException; //引用網址輸入錯誤
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class GlobalExceptionHandler extends ExceptionHandler
{
    use ApiResponseTrait; //使用特徵，類似將Trait撰寫的方法貼到這個類別中

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
    }

    public function render($request, Throwable $exception)
    {
        //TODO: 這邊以後可以規劃拆分response code(模組 code + 定義 ErrorCode), statusCode (ex: 400、500...)

        # Model 找不到資料
        if ($exception instanceof ModelNotFoundException) {
            return $this->errorResponse(
                '找不到資料',
                Response::HTTP_NOT_FOUND
            );
        }

        # 網址輸入錯誤
        if ($exception instanceof NotFoundHttpException) {
            return $this->errorResponse(
                '無法找到此網址',
                Response::HTTP_NOT_FOUND
            );
        }

        # 網址不允許該請求的動作
        if ($exception instanceof MethodNotAllowedHttpException) {
            return $this->errorResponse(
                $exception->getMessage(), //回傳例外內的訊息
                Response::HTTP_NOT_FOUND
            );
        }

        # Request Validation Error
        if ($exception instanceof ValidationException) {
            return $this->errorResponse(
                $exception->getMessage(), //回傳例外內的訊息
                Response::HTTP_BAD_REQUEST
            );
        }

        # 自定義 exception
        if ($exception instanceof ApiException) {
            return $this->errorResponse(
                $exception->getMessage(), //回傳例外內的訊息
                $exception->getCode() //自定義statusCode
            );
        }

        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        # 客戶端請求JSON格式
        if ($request->expectsJson()) {
            return $this->errorResponse(
                $exception->getMessage(),
                Response::HTTP_UNAUTHORIZED
            );
        } else {
            # 客戶端非請求JSON格式轉回登入畫面
            redirect()->guest($exception->redirectTo() ?? route('login'));
        }
    }
}

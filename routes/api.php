<?php

use App\Http\Controllers\Admin\V1\ProductAdminController;
use App\Http\Controllers\Admin\V1\UserAdminController;
use App\Http\Controllers\Public\V1\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

// 後台 api
Route::group([
    "prefix" => "admin/v1",
], function () {

    /** 商品 */
    Route::group([
        "prefix" => "product",
    ], function () {
        Route::post('', [ProductAdminController::class, 'create']);
        Route::get('{id}', [ProductAdminController::class, 'show']);
        Route::get('', [ProductAdminController::class, 'list']);
        Route::put('', [ProductAdminController::class, 'update']);
        Route::delete('{id}', [ProductAdminController::class, 'softDelete']);
    });

    /** 用戶 */
    Route::group([
        "prefix" => "user",
    ], function () {
        Route::get('{id}', [UserAdminController::class, 'show']);
        Route::get('', [UserAdminController::class, 'list']);
        Route::put('', [UserAdminController::class, 'update']);
    });
});

// 前台api
Route::group([
    "prefix" => "public/v1",
], function () {

    /** auth */
    Route::group([
        "prefix" => "auth",
    ], function () {
        Route::post('register', [AuthController::class, 'register']);
    });

    /** 用戶 */
    // Route::group([
    //     "prefix" => "user",
    // ], function () {
    // });
});

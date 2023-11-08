<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClockController;
use App\Http\Controllers\Api\LeaveApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::group([
        'prefix' => 'auth',
        'controller' => AuthController::class,
    ], function () {
        Route::post('/login', 'login');
        Route::post('/register', 'register');
        Route::post('/logout', 'logout');
        Route::post('/refresh', 'refresh');
    });

    Route::middleware('jwt')->group(function () {
        Route::get('/', function () {
            return 'losee';
        });

        Route::get('/me', [AuthController::class, 'me']);
        Route::POST('/change_password', [AuthController::class, 'change_password']);
        Route::POST('/change_avatar', [AuthController::class, 'change_avatar']);
        Route::get('/home', [ClockController::class, 'home']);

        Route::group([
            'prefix' => 'clock',
            'controller' => ClockController::class,
        ], function () {
            Route::get('/', 'index');
            Route::get('/shift', 'shift');
            Route::post('/', 'clock');
            Route::get('/today', 'today');
            Route::get('/location', 'location');
            Route::get('/rekap', 'rekap');
        });

        Route::apiResource('leave', LeaveApiController::class);
    });
});

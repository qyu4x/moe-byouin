<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['auth-web'])->group(function () {
    Route::get('/', function () {
        return view('auth.index');
    });

    Route::prefix('/admin')->group(function () {
        Route::get('/login', [\App\Http\Controllers\AdminController::class, 'login']);
        Route::post('/login', [\App\Http\Controllers\AdminController::class, 'doLogin']);
    });

    Route::prefix('/dokter')->group(function () {
        Route::get('/login', [\App\Http\Controllers\DokterController::class, 'login']);
        Route::post('/login', [\App\Http\Controllers\DokterController::class, 'doLogin']);

        Route::get('/register', [\App\Http\Controllers\DokterController::class, 'register']);
        Route::post('/register', [\App\Http\Controllers\DokterController::class, 'doRegister']);
    });

    Route::prefix('/pasien')->group(function () {
        Route::get('/login', [\App\Http\Controllers\PasienController::class, 'login']);
        Route::post('/login', [\App\Http\Controllers\PasienController::class, 'doLogin']);

        Route::get('/register', [\App\Http\Controllers\PasienController::class, 'register']);
        Route::post('/register', [\App\Http\Controllers\PasienController::class, 'doRegister']);
    });
});

Route::middleware(['authorize-web:PASIEN'])->prefix('/dashboard')->group(function () {
   Route::get('/test', function () {
       return "Hii";
   });
});

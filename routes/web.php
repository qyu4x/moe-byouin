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

Route::middleware(['authorization-web:admin'])->prefix('dashboard/admin')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\AdminController::class, 'doLogout']);

    Route::get('/obat', [\App\Http\Controllers\ObatController::class, 'viewObat']);

    Route::get('/obat/create', [\App\Http\Controllers\ObatController::class, 'viewCreate']);
    Route::post('/obat/create', [\App\Http\Controllers\ObatController::class, 'create']);

    Route::get('/obat/update/{obatId}', [\App\Http\Controllers\ObatController::class, 'viewUpdate']);
    Route::put('/obat/update/{obatId}',[\App\Http\Controllers\ObatController::class, 'update']);


    Route::get('/obat/list', [\App\Http\Controllers\ObatController::class, 'getAll']);
    Route::get('/obat/{obatId}', [\App\Http\Controllers\ObatController::class, 'get']);

    Route::delete('/obat/{obatId}', [\App\Http\Controllers\ObatController::class, 'delete']);
});

Route::middleware(['authorization-web:dokter'])->prefix('dashboard/dokter')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\DokterController::class, 'doLogout']);
});

Route::middleware(['authorization-web:pasien'])->prefix('dashboard/pasien')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\PasienController::class, 'doLogout']);
});


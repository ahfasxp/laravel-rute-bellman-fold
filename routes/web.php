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

Route::get('/', [App\Http\Controllers\AppController::class, 'index']);
Route::get('/distances', [App\Http\Controllers\AppController::class, 'distances']);
Route::get('/desa/{id}', [App\Http\Controllers\DesaController::class, 'detail']);
Route::get('/kecamatan/{id}', [App\Http\Controllers\KecamatanController::class, 'detail']);

Auth::routes(['register'=>false]);

Route::prefix('admin')->middleware(['middleware' => 'auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/users', App\Http\Controllers\UserController::class);
    Route::resource('/coordinates', App\Http\Controllers\CoordinateController::class);
    Route::resource('/graphs', App\Http\Controllers\GraphController::class);
    Route::resource('/desa', App\Http\Controllers\DesaController::class);
    Route::resource('/kecamatan', App\Http\Controllers\KecamatanController::class);
});

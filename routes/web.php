<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/fotos', [App\Http\Controllers\FotoController::class, 'index'])->name('fotos');
Route::post('/subirFoto', [App\Http\Controllers\FotoController::class, 'subirFoto'])->name('subirFoto');
Route::get('/foto/{ruta}', [App\Http\Controllers\FotoController::class, 'mostrarFoto']);

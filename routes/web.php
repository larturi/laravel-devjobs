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

// Autenticacion
Auth::routes(['verify' => true]);

// Resource Vacantes
Route::resource('vacantes', 'VacanteController');

// Subir Imagenes y Eliminarlas
Route::post('/vacantes/imagen', 'VacanteController@imagen')->name('vacantes.imagen');
Route::post('/vacantes/borrarimagen', 'VacanteController@borrarimagen')->name('vacantes.borrarimagen');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});


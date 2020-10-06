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
// clousure
Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

// controlador

Route::middleware('verified')->group(function () {
    Route::get('/home', 'HomeController@index')->name('inicio');

    Route::resource('persona', 'PersonaController');
    
    // Route::get('/admin', 'HomeController@admin')->name('admin');
    // Route::get('/personas', 'PersonaController@admin')->name('admin');
    // Route::get('/matricula', 'HomeController@admin')->name('admin');
    // Route::get('/curso', 'CursoController@admin')->name('admin');
});

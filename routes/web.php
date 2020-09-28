<?php

use Illuminate\Support\Facades\Route;
use App\Persona;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/persona', function () {
    // REGISTRAR
    // $persona = new Persona();
    // $persona->nombre = 'Juan';
    // $persona->apellido_paterno = 'Perez';
    // $persona->apellido_materno = 'Suarez';
    // $persona->email = 'jperez2@gmail.com';
    // $persona->save();
    // ACTUALIZAR
    // $persona = Persona::find(3);
    // $persona->apellido_paterno = 'Gonzales';
    // $persona->save();
    // ELIMINAR
    // $persona = Persona::find(4);
    // $persona->delete();
    // CONSULTA
    // $personas = Persona::all();
    $personas = Persona::where('name', '=', 'Jose')
        ->select('apellido_paterno', 'apellido_materno')
        ->orderBy('nombre', 'DESC')
        ->get();

    // DB::raw("SELECT procedimient(".$personas.")");
    // foreach($personas as $persona){
    //     echo $persona->apellido_paterno."<br>";
    // }
    echo "Ruta persona";
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('/');

//Route::get('manolo', function(){
//    return response('<h1>Hola</h1>', 200)
//        ->header('Content-Type', 'text/html')
//        ->cookie('blog','asasas',30);
//}) ;
Route::get('salir',function(){
   return redirect()->route('login');
});


Route::resource('propiedades','PropertyController');
Route::resource('usuarios','UserController');


//Route::resource('propiedades','PropertyController');
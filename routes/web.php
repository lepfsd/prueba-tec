<?php

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ejecutivos', 'HomeController@ejecutivos')->middleware('role:ejecutivos');
Route::get('/imagenes', 'HomeController@imagenes')->middleware('role:imagenes');
Route::get('/sgr', 'HomeController@sgr')->middleware('role:sgr');
Route::get('/iva', 'HomeController@iva')->middleware('role:iva');
Route::get('/paises', 'HomeController@paises')->middleware('role:paises');
Route::get('/monedas', 'HomeController@monedas')->middleware('role:monedas');
Route::get('/uso_plataforma', 'HomeController@usoPlataforma')->middleware('role:uso_plataforma');
Route::get('/notaria', 'HomeController@notaria')->middleware('role:notaria');
Route::get('/submenus', 'HomeController@submenus')->middleware('role:submenus');
Route::get('/submenu_actions', 'HomeController@submenuActions')->middleware('role:submenu_actions');
Route::get('/carga_masiva', 'HomeController@cargaMasiva')->middleware('role:carga_masiva');
Route::post("file-upload", "HomeController@fileUpload")->name("file.upload");
Route::get('file/{name}/download', 'HomeController@download')->name('file.download');

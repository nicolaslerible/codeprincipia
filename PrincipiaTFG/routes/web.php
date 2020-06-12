<?php

use GuzzleHttp\Middleware;
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
    return redirect('/user/game');
    //return view('user.game.ranking');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/ranking/{level}', 'UsrGameController@ranking')->name('ranking');


//Rutas para Administrador
Route::resource('admin/users', 'AdmUsersListController');

Route::resource('admin/levels', 'AdmLevelsController');

Route::name('levels.')->group(function () {
    Route::get('admin/levels/{level}', 'AdmScoreController@index')->name('score');
    Route::delete('admin/levels/{level}', 'AdmScoreController@destroy')->name('delete');
});

//Rutas para Usuarios

Route::resource('user/home', 'UsrUsersController');

Route::resource('user/game', 'UsrGameController');



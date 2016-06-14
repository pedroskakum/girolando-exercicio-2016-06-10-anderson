<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::resource('/', 'HomeController', ['only' => ['index']]);
Route::resource('/login', 'AutenticacaoController', ['only' => ['store']]);

Route::group(['middleware' => 'auth'], function(){
    Route::resource('/dashboard', 'App\DashboardController', ['only' => ['index']]);
});
/*
Route::get('/', function () {
    return view('welcome');
});*/

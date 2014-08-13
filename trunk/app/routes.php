<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

//categorias/pasteleria-dulces/1
Route::get('categorias/{slug}/{id}', ['as' => 'rubros', 'uses' => 'NegocioController@rubros']);

//yammis-peru/1
Route::get('/{slug}/{id}', ['as' => 'negocio', 'uses' => 'NegocioController@show']);

//Registro
Route::get('/registro', ['as' => 'registro', 'uses' => 'RegistroController@show']);


Route::get('sign-up',['as' => 'sign_up', 'uses' => 'UsersController@signUp']);

Route::post('sign-up',['as' => 'register', 'uses' => 'UsersController@register']);

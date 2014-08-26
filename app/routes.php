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

// Formulario de Registro
Route::get('sign-up',['as' => 'sign_up', 'uses' => 'UsersController@signUp']);

//Graba Registro
Route::post('sign-up',['as' => 'register', 'uses' => 'UsersController@register']);

//Formulario de Login
Route::get('login',['as' => 'login', 'uses' => 'UsersController@showLogin']);

//Valida el Incio de Sesion
Route::post('login',['as'=>'log_in', 'uses' => 'UsersController@login']);

//obtiene lista de Pronvicias by Id Departamento
Route::get('get/provincia/{departamento}',['as' => 'provincia', 'uses' => 'DashboardController@listProvincias']);

//obtiene lista de Distritos by Id Departamento, Provincia
Route::get('get/distrito/{departamento}/{provincia}',['as' => 'distrito', 'uses' => 'DashboardController@listDistrito']);


// Routes validando session
Route::group(array('before' => 'auth'), function()
{
    // Esta será nuestra ruta de bienvenida.
    Route::get('/dashboard',['as' => 'dashboard', 'uses' => 'DashboardController@showDashboard']);


    // Graba datos basicos - save_general
    Route::post('/dashboard-general',['as' => 'save_general', 'uses' => 'DashboardController@saveGeneral']);

    //Graba los datos de contacto - save_contact
    Route::post('/dashboard-contact', ['as' => 'save_contact', 'uses' => 'DashboardController@saveContact']);


    // Muestra la Gallery de fotos
    Route::get('/dashboard-gallery', ['as' => 'gallery', 'uses' => 'DashboardController@showGallery']);

    //Carga la Imagen
    Route::post('/dashboard-up', ['as' => 'upload_image', 'uses' => 'DashboardController@uploadImage']);

    //Ubicacion
    Route::get('/dashboard-map', ['as' => 'map', 'uses' => 'DashboardController@showUbication']);

    // Save Ubication
    Route::post('/dasboard-map', ['as' => 'save_ubication','uses' => 'DashboardController@saveUbication']);

    //Save Tags
    Route::post('/dashboard-tag', ['as' => 'save_tags', 'uses' => 'DashboardController@saveTag']);

    // Esta ruta nos servirá para cerrar sesión.
    Route::get('logout', ['as' => 'logout', 'uses' => 'DashboardController@logOut']);
});




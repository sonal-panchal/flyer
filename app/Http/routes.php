<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes...


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => ['web']], function () {
    Route::get('j',"FlyerController@index");
    Route::get('index',"cardController@index");
    Route::get('fourth',"FlyerController@show");
    Route::get('index/{id}',"cardController@show");
    Route::get('create',"FlyerController@create");
    Route::post('flyer',"FlyerController@store");
    Route::get('show/{id}',"FlyerController@view");
    Route::post('storeImage/{id}',"FlyerController@storeImage");
    Route::get('/logout', 'HomeController@logout');
    Route::delete('deleteimage/{id}','FlyerController@destroy');

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'FlyerController@index');
});


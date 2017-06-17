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
    //
});



Route::group(['middleware' => ['web'],'namespace' => 'Admin','prefix' => 'admin'], function () {

    Route::group(['prefix' => 'login'], function () {
        Route::get('index', 'LoginController@index');
        Route::post('login', 'LoginController@login');
    });

    Route::group(['prefix' => 'index'], function () {
        Route::get('index', 'IndexController@index');
    });

    Route::group(['prefix' => 'role'], function () {
        Route::get('index', 'RoleController@index');
        Route::get('add','RoleController@add');
        Route::post('add','RoleController@add');
        Route::get('edit','RoleController@edit');
    });

    Route::group(['prefix' => 'movie'], function () {
        Route::get('index', 'MovieController@index');
        Route::get('add','MovieController@add');
        Route::post('add','MovieController@add');
        Route::post('upload','MovieController@upload');
        Route::post('uploadmovie','MovieController@uploadMovie');
    });
});


Route::group(['namespace' => 'Sit','prefix' => 'movie'], function () {
        Route::get('index', 'MovieController@index');
});





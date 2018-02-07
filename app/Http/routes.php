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
//landing page route
Route::get('/', function () {
    return view('welcome');
});

//defaults routes
Route::get('/login','LoginController@index');
Route::post('/login','LoginController@login');
Route::get('/register', 'RegisterController@view');
Route::post('/register', 'RegisterController@store');


//all users routes
Route::get('/user','UserHomeController@index')->middleware(['auth','approve']);
Route::post('/user','UserHomeController@search')->middleware(['auth','approve']);
Route::get('/user/{id}','UserShowController@searchView')->middleware(['auth','approve']);
Route::get('user/active','UserHomeController@showActivePage')->middleware('auth');
Route::post('user/active','UserHomeController@activeCode')->middleware('auth');
Route::get('user/active/resend','UserHomeController@resendCode')->middleware('auth');
Route::get('/user/logout','UserHomeController@logout');


//all clients routes
Route::get('client','ClientHomeController@index')->middleware('auth:client');
Route::get('client/center','ClientHomeController@centerShow')->middleware('auth:client');
Route::post('client/center','ClientHomeController@updateCenter')->middleware('auth:client');
Route::get('client/logout','ClientHomeController@logout');


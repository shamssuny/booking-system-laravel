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
//Route::get('/register', 'RegisterController@view');
Route::post('/register', 'RegisterController@store');
Route::get('/resetPassword','LoginController@showReset');
Route::post('/resetPassword','LoginController@resetPassword');


//all users routes
Route::get('/user','UserHomeController@index')->middleware(['auth','approve']);
Route::post('/user','UserHomeController@search')->middleware(['auth','approve']);
//show center for user
Route::get('/user/center/{id}','UserShowController@searchView')->where('id','[0-9]+')->middleware(['auth','approve']);
//make a booking
Route::post('/user/book/{client_id}','BookingController@makeBook')->middleware(['auth','approve']);
Route::get('/user/bookings','BookingController@view')->middleware(['auth','approve']);
Route::post('/user/bookings','BookingController@payment')->middleware(['auth','approve']);
Route::get('user/profile','UserHomeController@showProfile')->middleware(['auth','approve']);
Route::post('user/profile','UserHomeController@updateProfile')->middleware(['auth','approve']);
Route::get('user/active','UserHomeController@showActivePage')->middleware('auth');
Route::post('user/active','UserHomeController@activeCode')->middleware('auth');
Route::get('user/active/resend','UserHomeController@resendCode')->middleware('auth');
Route::get('user/logout','UserHomeController@logout');


//all clients routes
Route::get('client','ClientHomeController@index')->middleware('auth:client');
Route::post('client','ClientHomeController@search');
Route::get('client/center','ClientHomeController@centerShow')->middleware('auth:client');
Route::post('client/center','ClientHomeController@updateCenter')->middleware('auth:client');
Route::get('client/bookings','ClientBookingController@show')->middleware('auth:client');
Route::post('client/bookings','ClientBookingController@clientLocalBook')->middleware('auth:client');
Route::get('client/profile','ClientHomeController@showUpdate')->middleware('auth:client');
Route::post('client/profile','ClientHomeController@update')->middleware('auth:client');
Route::get('client/show/center/{id}','ClientHomeController@showCenter');
Route::get('client/logout','ClientHomeController@logout');


//routes for support center
Route::get('support','SupportController@index');
Route::post('support','SupportController@store');


//routes for admin panel
Route::get('auth/login','AdminController@showLogin');
Route::post('auth/login','AdminController@login');
Route::get('auth/admin/client-verify','AdminController@showClientVerify')->middleware('adminAuth');
Route::get('auth/admin/client-verify/active/{id}','AdminController@activeClient')->middleware('adminAuth');
Route::get('auth/admin/client-verify/inactive/{id}','AdminController@inactiveClient')->middleware('adminAuth');
Route::get('auth/admin/client-manager','AdminController@showClientManager')->middleware('adminAuth');
Route::post('auth/admin/client-manager','AdminController@showSearchClients')->middleware('adminAuth');
Route::get('auth/admin/client-manager/delete/{id}','AdminController@deleteClient')->middleware('adminAuth');

Route::get('auth/admin/booking','AdminController@showBooking')->middleware('adminAuth');
Route::post('auth/admin/booking/{id}','AdminController@bookStatus')->middleware('adminAuth');

Route::get('auth/admin/user-manager','AdminController@showUserManager')->middleware('adminAuth');
Route::post('auth/admin/user-manager','AdminController@showSearchUser')->middleware('adminAuth');
Route::get('auth/admin/user-manager/delete/{id}','AdminController@deleteUser')->middleware('adminAuth');

Route::get('auth/admin/support','AdminController@showSupport')->middleware('adminAuth');
Route::post('auth/admin/support/{id}','AdminController@updateSupport')->middleware('adminAuth');

Route::get('auth/admin','AdminController@index')->middleware('adminAuth');
Route::get('auth/logout','AdminController@logout');


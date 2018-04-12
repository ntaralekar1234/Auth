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

Route::get('/verify/{email}/{token}', 'VerifyEmailController@index')->name('verify');

Route::post('/userupdate','UserController@update');

Route::post('/servicesupdate','UserController@servicesupdate');

Route::post('/servicesadd','UserController@servicesadd');

Route::get('/getusers/{category}','AdminController@getusers');

Route::post('/sendAd','AdminController@sendAd');



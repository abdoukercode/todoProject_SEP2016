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

Route::get('/', function () {
    return view('welcome');
});
Route::get('profile',[
    'as'=>'profile',
    'uses'=>'UserController@profile',

]);
Route::post('profile','UserController@update_avatar');

Route::get('regRequest','regRequestController@create');

Route::post('regRequest','regRequestController@store');


Route::auth();

Route::get('/home', 'HomeController@index');

 
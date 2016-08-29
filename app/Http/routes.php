<?php
Use App\Task;
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
/*Form model binding laravel.. very powerful tool*/
Route::bind('item',function($value, $route){
    return Task::where('id',$value)->first();
});
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

Route::get('new','HomeController@getNew');
Route::post('new','HomeController@postNew');

Route::get('edit/{id}','HomeController@editTask');
Route::patch('edit/{id}/','HomeController@updateTask');


Route::get('delete/{item}/','HomeController@getDelete');





Route::auth();

Route::get('/home', 'HomeController@index');

 
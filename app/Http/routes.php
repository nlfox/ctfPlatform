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

Route::get('/', 'HomeController@index');
Route::controller("/profile", 'ProfileController');

Route::auth();

Route::get('/solverecord','NoticeController@solveRecord');
Route::get('/notice','NoticeController@notice');
Route::get('/score','NoticeController@score');
Route::get('/mdtest','NoticeController@mdtest');

Route::get('/home', 'HomeController@index');
Route::group(['prefix' => 'task'], function()
{
    Route::controller("/", 'TaskController');

});

Route::group(['prefix' => 'admin'], function()
{
    Route::controller("/task", 'Admin\TaskController');
    Route::controller("/post", 'Admin\PostController');
    Route::controller("/intro", 'Admin\AdminController');
    Route::controller("/settings", 'Admin\SettingsController');
});


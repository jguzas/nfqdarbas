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

Route::get('/', function()
{
	return View::make('layout');
});

Route::group(["before" => "guest"], function()
{
    Route::any("/login", [
        "as"   => "users/login",
        "uses" => "UsersController@loginAction"
    ]);
});

Route::group(["before" => "auth"], function()
{
    Route::any("/logout", [
        "as"   => "users/logout",
        "uses" => "UsersController@logoutAction"
    ]);

    Route::get('/create', function()
    {
        return View::make('create');
    });

    Route::any("/createAlbum", [
        "as"   => "users/createAlbum",
        "uses" => "UsersController@createAlbumAction"
    ]);

    Route::get('/','UsersController@showAlbumsAction');
});
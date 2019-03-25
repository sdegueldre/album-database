<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {
    Route::post('logout', 'ApiAuthController@logout');
    Route::post('refresh', 'ApiAuthController@refresh');
    Route::get('user', 'ApiAuthController@user');

    Route::post('albums', 'AlbumController@create');
    Route::get('albums/{album}', 'AlbumController@read');
    Route::get('albums', 'AlbumController@search');
    Route::put('albums/{album}', 'AlbumController@update');
    Route::delete('albums/{album}', 'AlbumController@delete');
});

Route::post('login', 'ApiAuthController@login');

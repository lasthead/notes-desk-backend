<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: POST,GET,PUT,PATCH,OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('create', 'AuthController@create');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::group([
    'middleware' => 'auth:api'
], function() {
    Route::get('get_items_list', 'NotesController@getList');
    // Route::get('get_item', 'NotesController@getItemById');
    Route::post('create_item', 'NotesController@createItem');
    Route::put('update_item', 'NotesController@updateItem');
    // Route::delete('remove_item', 'NotesController@removeItem');
});

// I did this because these methods are blocked by the cors policy. And i dont now how to fix it
Route::get('get_item', 'NotesController@getItemById');
Route::delete('remove_item', 'NotesController@removeItem');

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


Route::get('/tasks', ['uses' => 'TasksController@index']);
Route::post('/tasks', ['uses' => 'TasksController@store']);
Route::put('/tasks/{task}', ['uses' => 'TasksController@update']);
Route::delete('/tasks/{task}', ['uses' => 'TasksController@delete']);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/todo','ToDoController');

Route::get('/index', 'ToDoController@index');
Route::post('/store', 'ToDoController@store');
Route::post('/update', 'ToDoController@update');
Route::post('/delete', 'ToDoController@destroy');

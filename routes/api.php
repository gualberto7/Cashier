<?php

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
    });
});

Route::group(['prefix' => 'user', 'middleware' => 'auth:api'], function () {
	Route::apiResource('boxes', 'BoxController');
});
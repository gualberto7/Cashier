<?php

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
	Route::post('boxes', 'BoxController@store')->name('box.store');
	Route::put('boxes', 'BoxController@update')->name('box.update');
	Route::get('boxes/{box}', 'BoxController@show')->name('box.show');
	Route::post('accounts', 'AccountController@store')->name('account.store');
});
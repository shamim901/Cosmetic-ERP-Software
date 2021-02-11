<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::group(['namespace' => 'Mosques'], function () {

	/*
	 * These frontend controllers require the user to be logged in
	 * All route names are prefixed with 'frontend.'
	 */
	Route::group(['middleware' => 'auth'], function () {
		
		Route::get('mosque/create', 'MosquesController@create');
		Route::post('mosque/create', 'MosquesController@store')->name('mosque.create');

		// Route::get('mosque/list', 'MosquesController@index')->name('mosque.list');
		Route::get('mosque/details/{mosque_id}', 'MosquesController@show')->name('mosque.details');

		Route::get('mosque/edit/{mosque_id}', 'MosquesController@edit');
		Route::post('mosque/edit', 'MosquesController@update')->name('mosque.update');

		Route::get('mosque/mosApp','MosquesController@mosApplicationPrintView');

		Route::get('mosque/mosApplication/{mosque_id}','MosquesController@mosApplicationForm')->name('mosque.mosApplication');

		Route::post('mosque/createlib', 'MosquesController@createlib')->name('mosque.createlib');
	

		Route::post('mosque/list', 'MosquesController@searchPanel')->name('mosque.list');
		
		// auto field search setup by Shamim
		Route::get('mosque/mosqueNameSearch', 'MosquesController@mosqueNameSearch')->name('mosque.mosqueNameSearch');
		Route::get('mosque/mosqueNameSearchByRegCode', 'MosquesController@mosqueNameSearchByRegCode')->name('mosque.mosqueNameSearchByRegCode');




	    
	});
});




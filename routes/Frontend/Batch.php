<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::group(['namespace' => 'Batchs'], function () {

	/*
	 * These frontend controllers require the user to be logged in
	 * All route names are prefixed with 'frontend.' 
	 */
	Route::group(['middleware' => 'auth'], function () {
		
		// training form and save also list routes by Shamim
		Route::get('batch/set_up', 'BatchController@registration_form')->name('batch.set_up');
		Route::post('batch/save', 'BatchController@save')->name('batch.save');
		Route::post('batch/saveOfc', 'BatchController@saveOfc')->name('batch.saveOfc');
		Route::post('batch/saveOfcFront', 'BatchController@saveOfcFront')->name('batch.saveOfcFront');
		Route::get('batch/list', 'BatchController@show_list')->name('batch.list');
		Route::get('batch/edit_ofc', 'BatchController@ofice_info')->name('batch.edit_ofc');

		Route::get('batch/update/{id}', 'BatchController@update_form')->name('batch.update');
		Route::post('batch/updating', 'BatchController@updating')->name('batch.updating');		


	    
	});
});




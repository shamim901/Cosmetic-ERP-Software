<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::group(['namespace' => 'Categorys'], function () {

	/*
	 * These frontend controllers require the user to be logged in
	 * All route names are prefixed with 'frontend.' 
	 */
	Route::group(['middleware' => 'auth'], function () { 
		
		// training form and save also list routes by Shamim
		Route::get('category/set_up', 'CategoryController@registration_form')->name('category.set_up');
		Route::post('category/save', 'CategoryController@save')->name('category.save');
		
		Route::get('category/list', 'CategoryController@show_list')->name('category.list');
		Route::get('category/update/{id}', 'CategoryController@update_form')->name('category.update');
		Route::post('category/updating', 'CategoryController@updating')->name('category.updating');		


	    
	});
});




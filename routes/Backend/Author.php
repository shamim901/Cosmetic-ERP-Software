<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::group(['namespace' => 'Authors'], function () {

	/*
	 * These frontend controllers require the user to be logged in
	 * All route names are prefixed with 'frontend.' 
	 */
	Route::group(['middleware' => 'auth'], function () {
		
		// training form and save also list routes by Shamim
		Route::get('author/set_up', 'AuthorController@registration_form')->name('author.set_up');
		Route::post('author/save', 'AuthorController@save')->name('author.save');
		Route::get('author/list', 'AuthorController@show_list')->name('author.list');
		Route::post('author/list', 'AuthorController@search')->name('author.search');

		Route::get('author/update/{id}', 'AuthorController@update_form')->name('author.update');
		Route::post('author/updating', 'AuthorController@updating')->name('author.updating');

		// Route::get('author/authorNameSearch', 'AuthorController@authorNameSearch')->name('author.authorNameSearch');		


	    
	});
});




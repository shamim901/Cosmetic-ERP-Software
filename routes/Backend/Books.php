<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::group(['namespace' => 'Books'], function () {

	/*
	 * These frontend controllers require the user to be logged in
	 * All route names are prefixed with 'frontend.' 
	 */
	Route::group(['middleware' => 'auth'], function () {
		
		// training form and save also list routes by Shamim
		Route::get('book/set_up', 'BooksController@registration_form')->name('book.set_up');
		Route::post('book/save', 'BooksController@save')->name('book.save');
		
		Route::get('book/list', 'BooksController@show_list')->name('book.list');

		Route::get('book/add_new_athor', 'BooksController@add_new_athor')->name('book.add_new_athor');

		Route::post('book/list', 'BooksController@search')->name('book.search');
		Route::get('book/update/{id}', 'BooksController@update_form')->name('book.update');
		Route::post('book/updating', 'BooksController@updating')->name('book.updating');		
		
		Route::get('book/authorNameSearch', 'BooksController@authorNameSearch')->name('book.authorNameSearch');		
		Route::get('book/thanaAdd', 'BooksController@thanaAdd')->name('book.thanaAdd');		

		Route::post('book/save_author', 'BooksController@save_author')->name('book.save_author');
		Route::post('book/savethana', 'BooksController@savethana')->name('book.savethana');
 


	    
	});
});




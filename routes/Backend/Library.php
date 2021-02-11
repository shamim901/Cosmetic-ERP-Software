<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::group(['namespace' => 'Librarys'], function () {

	/*
	 * These frontend controllers require the user to be logged in
	 * All route names are prefixed with 'frontend.'
	 */
	Route::group(['middleware' => 'auth'], function () {
		
		Route::get('library/create', 'LibrarysController@showLibraryForm');
		Route::post('library/create', 'LibrarysController@store')->name('library.create');

		Route::get('library/list', 'LibrarysController@index')->name('library.list');
		Route::get('library/pending_list', 'LibrarysController@pending_list')->name('library.pending_list');
		Route::get('library/details/{library_id}', 'LibrarysController@show')->name('library.details');

		Route::get('library/edit/{library_id}', 'LibrarysController@edit');
		Route::post('library/edit', 'LibrarysController@update')->name('library.update');

		Route::post('library/list', 'LibrarysController@searchPanel')->name('library.list');
		Route::post('library/pending_list', 'LibrarysController@pendingLibrarySearchPanel')->name('library.pending_list');

		// library print View
		Route::get('library/printView/{library_id}', 'LibrarysController@printLibraryInfo')->name('library.printView');
	    
	});
});


<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::group(['namespace' => 'BookSellers'], function () {

	/*
	 * These frontend controllers require the user to be logged in
	 * All route names are prefixed with 'frontend.' 
	 */
	Route::group(['middleware' => 'auth'], function () {
		
		// training form and save also list routes by Shamim
		Route::get('bseller/set_up', 'BSellerController@registration_form')->name('bseller.set_up');
		Route::post('bseller/save', 'BSellerController@save')->name('bseller.save');
		Route::post('bseller/savethana', 'BSellerController@savethana')->name('bseller.savethana');
		Route::post('bseller/list', 'BSellerController@search')->name('bseller.search');
		
		Route::get('bseller/list', 'BSellerController@show_list')->name('bseller.list');
		Route::get('bseller/update/{id}', 'BSellerController@update_form')->name('bseller.update');
		Route::post('bseller/updating', 'BSellerController@updating')->name('bseller.updating');		


	    
	});
});




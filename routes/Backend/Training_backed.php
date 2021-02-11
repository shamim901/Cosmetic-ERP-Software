<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::group(['namespace' => 'Training'], function () {

	/*
	 * These frontend controllers require the user to be logged in
	 * All route names are prefixed with 'frontend.' 
	 */
	Route::group(['middleware' => 'auth'], function () {
		
		// training form and save also list routes by Shamim
		Route::get('train/training', 'TrainingController@registration_form')->name('train.training');
		Route::post('train/save', 'TrainingController@save')->name('train.save');
		Route::get('train/list', 'TrainingController@show_list')->name('train.list');

		// edit
		Route::get('train/edit/{id}', 'TrainingController@edit_form')->name('train.edit');
		Route::post('train/update', 'TrainingController@updating')->name('train.update');

		// training list with current status
		Route::get('train/list_new', 'TrainingController@show_list_new')->name('train.list_new');
		Route::post('train/list_new', 'TrainingController@trainingSearchPanel')->name('train.list_new');


		// status change 

		Route::get('train/approve/{id}', 'TrainingController@approve')->name('train.approve');
		Route::get('train/cancel/{id}', 'TrainingController@cancel')->name('train.cancel');
		Route::get('train/delete/{id}', 'TrainingController@delete')->name('train.delete');

		Route::post('train/list','TrainingController@search')->name('train.list');

	    
	});
});




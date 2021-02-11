<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::group(['namespace' => 'Imams'], function () {

	/*
	 * These frontend controllers require the user to be logged in
	 * All route names are prefixed with 'frontend.'
	 */
	Route::group(['middleware' => 'auth'], function () {
		
		// imam form and save routes by Shamim
		// Route::get('imam/create_iform', 'ImamController@registration_form')->name('imam.create_iform');
		Route::post('imam/saveImamInfo', 'ImamController@saveImamInfo')->name('imam.saveImamInfo');

		// // imam training form and save routes by Shamim			
		// Route::get('imam/train/{id}', 'ImamController@trainingRegistration')->name('imam.train');
		// Route::post('imam/train_imam', 'ImamController@saveTrainImam')->name('imam.train_imam');

		// imam list and training request list routes by Shamim
		Route::get('imam/showImamList', 'ImamController@showImamList')->name('imam.showImamList');
		//Route::get('imam/imam_training_reg_list', 'ImamController@imam_training_reg_list')->name('imam.imam_training_reg_list');

		// imam search routes
		Route::post('imam/showImamList', 'ImamController@searchPanel')->name('imam.showImamList');
		Route::post('imam/imam_trainee_req_list', 'ImamController@trainingReqSearchPanel')->name('imam.imam_trainee_req_list');

		// muajjin form and save routes by Shamim
		// Route::get('imam/create_muajjin_from', 'ImamController@mu_registration_form')->name('imam.create_muajjin_from');	
		Route::post('imam/saveMuaInfo', 'ImamController@saveMuaInfo')->name('imam.saveMuaInfo');	

		// khotib form and save routes by Shamim
		// Route::get('imam/create_khotib_from', 'ImamController@khotib_registration_form')->name('imam.create_khotib_from');	
		Route::post('imam/saveKhotibInfo', 'ImamController@saveKhotibInfo')->name('imam.saveKhotibInfo');	


		// // mua and khotib list
		// Route::get('imam/showMuaList', 'ImamController@showMuaList')->name('imam.showMuaList');
		// Route::get('imam/showKhotibList', 'ImamController@showKhotibList')->name('imam.showKhotibList');


		//imam edit 
		Route::get('imam/edit/{id}', 'ImamController@edit')->name('imam.edit');
		Route::post('imam/update', 'ImamController@update')->name('imam.update');

		
		// muajjin search
		Route::post('imam/showMuaList', 'ImamController@muaSearchPanel')->name('imam.showMuaList');
		
		// khotib search
		Route::post('imam/showKhotibList', 'ImamController@khotibSearchPanel')->name('imam.showKhotibList');
		





	    
	});
});




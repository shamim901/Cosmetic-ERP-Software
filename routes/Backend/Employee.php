<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::group(['namespace' => 'Employee'], function () {

	/*
	 * These frontend controllers require the user to be logged in
	 * All route names are prefixed with 'frontend.' 
	 */
	Route::group(['middleware' => 'auth'], function () {
		
		// training form and save also list routes by Shamim
		Route::get('employee/set_up', 'EmployeeController@registration_form')->name('employee.set_up');
		Route::get('employee/list', 'EmployeeController@show_list')->name('employee.list');
		Route::get('employee/picture', 'EmployeeController@picture')->name('employee.picture');
		Route::get('employee/contact_no', 'EmployeeController@contact_no')->name('employee.contact_no');
		Route::get('employee/familly_info', 'EmployeeController@familly_info')->name('employee.familly_info');
		Route::get('employee/education_info', 'EmployeeController@education_info')->name('employee.education_info');
		Route::get('employee/work_experince', 'EmployeeController@work_experince')->name('employee.work_experince');
		
		Route::get('employee/training', 'EmployeeController@training')->name('employee.training');
		Route::get('employee/imp_nothi', 'EmployeeController@imp_nothi')->name('employee.imp_nothi');
		Route::get('employee/niog', 'EmployeeController@niog')->name('employee.niog');
		Route::get('employee/bank_info', 'EmployeeController@bank_info')->name('employee.bank_info');
		Route::get('employee/niog_info', 'EmployeeController@niog_info')->name('employee.niog_info');
		
		Route::get('employee/transfer', 'EmployeeController@transfer')->name('employee.transfer');
		Route::get('employee/acr', 'EmployeeController@acr')->name('employee.acr');
		Route::get('employee/nirikha', 'EmployeeController@nirikha')->name('employee.nirikha');
		Route::get('employee/attikoron', 'EmployeeController@attikoron')->name('employee.attikoron');
		Route::get('employee/promotion', 'EmployeeController@promotion')->name('employee.promotion');
		Route::get('employee/prokasona', 'EmployeeController@prokasona')->name('employee.prokasona');
		
		Route::post('employee/savePersonalInfo', 'EmployeeController@savePersonalInfo')->name('employee.savePersonalInfo');
		Route::post('employee/saveContactInfo', 'EmployeeController@saveContactInfo')->name('employee.saveContactInfo');
		Route::post('employee/saveFamillyInfo', 'EmployeeController@saveFamillyInfo')->name('employee.saveFamillyInfo');
		Route::post('employee/saveWorkingExInfo', 'EmployeeController@saveWorkingExInfo')->name('employee.saveWorkingExInfo');

		Route::post('employee/saveDocuement', 'EmployeeController@saveDocuement')->name('employee.saveDocuement');
		
		Route::post('employee/saveNiog', 'EmployeeController@saveNiog')->name('employee.saveNiog');
		Route::post('employee/savebank', 'EmployeeController@savebank')->name('employee.savebank');
		Route::post('employee/saveNiogInfo', 'EmployeeController@saveNiogInfo')->name('employee.saveNiogInfo');
		Route::post('employee/saveTransfer', 'EmployeeController@saveTransfer')->name('employee.saveTransfer');
		Route::post('employee/saveacr', 'EmployeeController@saveacr')->name('employee.saveacr');
		Route::post('employee/saveNirikha', 'EmployeeController@saveNirikha')->name('employee.saveNirikha');
		Route::post('employee/saveAttikoron', 'EmployeeController@saveAttikoron')->name('employee.saveAttikoron');
		Route::post('employee/saveTraining', 'EmployeeController@saveTraining')->name('employee.saveTraining');
		Route::post('employee/savePromosion', 'EmployeeController@savePromosion')->name('employee.savePromosion');
		
		// Route::get('book/list', 'BooksController@show_list')->name('book.list');

		// Route::get('book/add_new_athor', 'BooksController@add_new_athor')->name('book.add_new_athor');

		// Route::post('book/list', 'BooksController@search')->name('book.search');
		// Route::get('book/update/{id}', 'BooksController@update_form')->name('book.update');
		// Route::post('book/updating', 'BooksController@updating')->name('book.updating');		
		
		// Route::get('book/authorNameSearch', 'BooksController@authorNameSearch')->name('book.authorNameSearch');		

		// Route::post('book/save_author', 'BooksController@save_author')->name('book.save_author');


	    
	});
});




<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::group(['namespace' => 'EmpRole'], function () {

	/*
	 * These frontend controllers require the user to be logged in
	 * All route names are prefixed with 'frontend.' 
	 */
	Route::group(['middleware' => 'auth'], function () {
		
		// training form and save also list routes by Shamim
		Route::get('emp_role/create', 'EmpRoleController@registration_form')->name('emp_role.create');
		Route::post('emp_role/save', 'EmpRoleController@save')->name('emp_role.save');

		Route::get('emp_role/list', 'EmpRoleController@show_list')->name('emp_role.list');

		Route::get('emp_role/emp_role', 'EmpRoleController@edit_form')->name('emp_role.emp_role');

		// edit
		Route::get('emp_role/edit/{id}', 'EmpRoleController@edit_form')->name('emp_role.edit');
		Route::post('emp_role/update', 'EmpRoleController@updating')->name('emp_role.update');



		 
	    
	});
});




<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::group(['namespace' => 'Book_Requisition'], function () {

	/*
	 * These frontend controllers require the user to be logged in
	 * All route names are prefixed with 'frontend.' 
	 */
	Route::group(['middleware' => 'auth'], function () {
		
		//  by Shamim
		Route::get('requisition/create', 'RequisitionController@registration_form')->name('requisition.create');
		Route::post('requisition/save', 'RequisitionController@save')->name('requisition.save');
		
		Route::get('requisition/list', 'RequisitionController@show_list')->name('requisition.list');
		Route::post('requisition/list', 'RequisitionController@search')->name('requisition.list');

		Route::get('requisition/issue_list', 'RequisitionController@issue_pending_list')->name('requisition.issue_list');
		
		 
		Route::post('requisition/issued', 'RequisitionController@issue')->name('requisition.issued');

		Route::post('requisition/checkStock','RequisitionController@checkStock')->name('requisition.checkStock');		
		
		Route::get('requisition/getMedicineInfo/{id}','RequisitionController@getMedicineInfo')->name('requisition.getMedicineInfo');		
		
		Route::get('requisition/getBookSellerInfo/{id}','RequisitionController@getBookSellerInfo')->name('sale.getBookSellerInfo');		

		Route::get('requisition/getReqDetails/{id}','RequisitionController@getReqDetails')->name('requisition.getReqDetails');				
		Route::get('requisition/bookNameSearch','RequisitionController@bookNameSearch')->name('requisition.bookNameSearch');
		Route::get('requisition/bookSellerSearch','RequisitionController@bookSellerSearch')->name('requisition.bookSellerSearch');
	});
});




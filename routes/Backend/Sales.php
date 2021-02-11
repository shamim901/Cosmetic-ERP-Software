<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::group(['namespace' => 'Sales'], function () {

	/*
	 * These frontend controllers require the user to be logged in
	 * All route names are prefixed with 'frontend.' 
	 */
	Route::group(['middleware' => 'auth'], function () {
		
		// training form and save also list routes by Shamim
		Route::get('sale/set_up', 'SalesController@registration_form')->name('sale.set_up');
		Route::post('sale/save', 'SalesController@save')->name('sale.save');
		
		Route::get('sale/list', 'SalesController@show_list')->name('sale.list');
				
		Route::post('sale/list', 'SalesController@search')->name('sale.search'); 

		Route::post('sale/checkStock_sale','SalesController@checkStock_sale')->name('sale.checkStock_sale');		
		Route::post('sale/checkStock','SalesController@checkStock')->name('sale.checkStock');		
		
		Route::get('sale/getMedicineInfo/{id}','SalesController@getMedicineInfo')->name('sale.getMedicineInfo');	

		Route::get('sale/getMedicineInfo_sale/{id}','SalesController@getMedicineInfo_sale')->name('sale.getMedicineInfo_sale');		
		
		Route::get('sale/getCustomer_info/{id}','SalesController@getCustomer_info')->name('sale.getCustomer_info');		
				
		Route::get('sale/reprint/{id}','SalesController@reprint')->name('sale.reprint');

		Route::post('sale/list','SalesController@search')->name('sale.list');


		// due paid route
		Route::get('sale/due_list', 'SalesController@due_list')->name('sale.due_list');
		

	    
	});
});


// auto search route
Route::get('sale/bookNameSearch','CommonController@bookNameSearch')->name('sale.bookNameSearch');
Route::get('sale/customerNameSearch','CommonController@customerNameSearch')->name('sale.customerNameSearch');				
Route::get('sale/sellCenterNameSearch','CommonController@sellCenterNameSearch')->name('sale.sellCenterNameSearch');



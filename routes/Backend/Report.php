<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::group(['namespace' => 'Report'], function () {

	/*
	 * These frontend controllers require the user to be logged in
	 * All route names are prefixed with 'frontend.' 
	 */
	Route::group(['middleware' => 'auth'], function () {
		
		// report routes by Shamim
		Route::get('report/top_seller', 'ReportController@topSeller')->name('report.top_seller');
		 
			    
	});
});




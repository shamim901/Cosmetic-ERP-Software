<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::group(['namespace' => 'Product'], function () {

	/*
	 * These frontend controllers require the user to be logged in
	 * All route names are prefixed with 'frontend.' 
	 */
	Route::group(['middleware' => 'auth'], function () {
		
		/* company route start */
		Route::get('product/company_create', 'ProductController@company_create')->name('product.company_create');
		Route::post('product/company_save', 'ProductController@company_save')->name('product.company_save');
		Route::get('product/company_list', 'ProductController@company_list')->name('product.company_list');
		/* company route end */

		/* category route start */
		Route::get('product/category_create', 'ProductController@category_create')->name('product.category_create');
		Route::post('product/category_save', 'ProductController@category_save')->name('product.category_save');
		Route::get('product/category_list', 'ProductController@category_list')->name('product.category_list');
		/* category route end */

		/* opening balance route start */
		Route::get('product/opening_balance_create', 'ProductController@opening_balance_create')->name('product.opening_balance_create');
		Route::post('product/opening_balance_save', 'ProductController@opening_balance_save')->name('product.opening_balance_save');
		Route::get('product/opening_balance_list', 'ProductController@opening_balance_list')->name('product.opening_balance_list');
		Route::post('product/opening_balance_update', 'ProductController@opening_balance_update')->name('product.opening_balance_update');
		/* opening balance route end */

		/* price update route start */
		Route::get('product/price_list', 'ProductController@price_list')->name('product.price_list');
		Route::post('product/price_update', 'ProductController@price_update')->name('product.price_update');
		/* price update route start */

		/* product route start */
		Route::get('product/product_setup','ProductController@product_setup')->name('product.product_setup');
		Route::post('product/product_save','ProductController@product_save')->name('product.product_save');
		Route::get('product/product_list','ProductController@product_list')->name('product.product_list');
		Route::get('product/product_update/{id}','ProductController@product_update')->name('product.product_update');
		/* product route end */


		/* purchase route start */
		Route::get('product/purchase_setup','ProductController@purchase_setup')->name('product.purchase_setup');
		Route::post('product/purchase_save','ProductController@purchase_save')->name('product.purchase_save');
		Route::get('product/purchase_list','ProductController@purchase_list')->name('product.purchase_list');
		/* purchase route end */

	    
	});
});

// search routes into common controller
Route::get('product/companyNameSearch','CommonController@companyNameSearch')->name('product.companyNameSearch'); 
Route::get('product/categoryNameSearch','CommonController@categoryNameSearch')->name('product.categoryNameSearch'); 
Route::get('product/productNameSearch','CommonController@productNameSearch')->name('product.productNameSearch'); 






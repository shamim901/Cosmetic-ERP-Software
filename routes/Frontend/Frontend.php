<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'FrontendController@index')->name('index');
Route::get('/faqs', 'FrontendController@faqs')->name('faqs');
Route::get('/contacts', 'FrontendController@contacts')->name('contacts');
Route::post('/get/states', 'FrontendController@getStates')->name('get.states');
Route::post('/get/cities', 'FrontendController@getCities')->name('get.cities');

Route::get('/imam/imam_training_reg_list', 'Imams\ImamController@imam_training_reg_list')->name('imam.imam_training_reg_list');

Route::get('/imam/showImamList', 'Imams\ImamController@showImamList')->name('imam.showImamList');

// imam training form and save routes by Shamim         
Route::get('imam/train/{id}', 'Imams\ImamController@trainingRegistration')->name('imam.train');
Route::post('imam/train_imam', 'Imams\ImamController@saveTrainImam')->name('imam.train_imam');
Route::get('imam/mosjid_pending_list', 'Imams\ImamController@mosjid_pending_list')->name('imam.mosjid_pending_list');

Route::get('imam/authentic_mosjid/{id}', 'Imams\ImamController@authentic_mosjid')->name('imam.authentic_mosjid');

Route::get('mosque/list', 'MosquesController@index')->name('mosque.list');
Route::get('mosque/pending_list', 'MosquesController@pending_list')->name('mosque.pending_list');


Route::get('library/create', 'Librarys\LibrarysController@showLibraryForm')->name('library.create');

Route::get('imam/create_muajjin_from', 'Imams\ImamController@mu_registration_form')->name('imam.create_muajjin_from');

Route::get('imam/create_khotib_from', 'Imams\ImamController@khotib_registration_form')->name('imam.create_khotib_from');  

Route::get('imam/create_iform', 'Imams\ImamController@registration_form')->name('imam.create_iform');

Route::get('mosque/list', 'Mosques\MosquesController@index')->name('mosque.list');

Route::get('library/list', 'Librarys\LibrarysController@index')->name('library.list');
Route::get('library/pending_list', 'Librarys\LibrarysController@pending_list_new')->name('library.pending_list');


Route::get('imam/showMuaList', 'Imams\ImamController@showMuaList')->name('imam.showMuaList');
Route::get('imam/showKhotibList', 'Imams\ImamController@showKhotibList')->name('imam.showKhotibList');







/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');

        /*
         * User Profile Picture
         */
        Route::patch('profile-picture/update', 'ProfileController@updateProfilePicture')->name('profile-picture.update');
    });
});

/*
* Show pages
*/
Route::get('pages/{slug}', 'FrontendController@showPage')->name('pages.show');

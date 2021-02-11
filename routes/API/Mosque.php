<?php

/**
 * All route names are prefixed with 'api.v1'.
 */
Route::group([
    'namespace' => 'Mosque',
], function () {
    
    Route::post('mosjid/create', 'MosqueController@create');
    Route::get('mosjid/{created_by}/list', 'MosqueController@index');
    Route::post('mosjid/details', 'MosqueController@details');
    Route::post('mosjid/{mosjid_id}/edit', 'MosqueController@edit');
    Route::post('mosjid/deleteSurvey', 'MosqueController@destroy');
    Route::post('mosjid/submitSurvey', 'MosqueController@status');
});

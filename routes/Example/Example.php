<?php

/**
 * All route names are prefixed with 'api.v1.example'.
 */
Route::group([
    'prefix'    => 'example',
    'as'        => 'example.',
    'namespace' => 'Example',
], function () {
    /*
     * Example API routes
     */
    Route::post('example', 'ExampleController@store');
    Route::put('example', 'ExampleController@update');
    Route::get('example', 'ExampleController@list');
    Route::get('example/{id}', 'ExampleController@exampleDetails');
});

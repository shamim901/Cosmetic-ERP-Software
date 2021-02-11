<?php

/*
 * Example
 */
Route::group(['namespace' => 'Example'], function () {
    Route::get('example', 'ExampleController@index');
});

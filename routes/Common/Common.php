<?php

Route::group(
    [
        'namespace' => 'Common'
    ], function () {
// Divisions
    Route::get('divisions', 'GeoController@divisions');
    Route::get('divisions/{division_id}', 'GeoController@divisionDetails');
    Route::get('divisions/{division_id}/districts', 'GeoController@districtsByDivision');

// Districts
    Route::get('districts', 'GeoController@districts');
    Route::get('districts/{district_id}', 'GeoController@districtDetails');
    Route::get('districts/{district_id}/upazilas', 'GeoController@upazilasByDistrict');

// Thanas/Upazilas
    Route::get('upazilas', 'GeoController@upazilas');
    Route::get('upazilas/{upazila_id}', 'GeoController@upazilaDetails');
    Route::get('upazilas/{upazila_id}/unions', 'GeoController@unionsByUpazila');

// Unions
    Route::get('unions', 'GeoController@unions');
    Route::get('unions/:union_id', 'GeoController@unionDetails');

    Route::get('unions/{union_id}/villages', 'GeoController@villageByUnion');
    Route::get('unions/{union_id}/villages-search', 'GeoController@villageSearchByUnion');

// Village
    Route::get('villages', 'GeoController@villages');
    Route::get('villages/{village_id}', 'GeoController@villageDetails');
   
;});
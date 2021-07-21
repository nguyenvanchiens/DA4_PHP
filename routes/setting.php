<?php

Route::prefix('setting')->group(function () {
    Route::get('/','SettingController@index');

    Route::get('addsetting','SettingController@getaddsetting');
    Route::post('addsetting','SettingController@postaddsetting');

    Route::get('editsetting/{id}','SettingController@geteditsetting');
    Route::post('editsetting/{id}','SettingController@posteditsetting');

    Route::get('deletesetting/{id}','SettingController@getDelete');
});

?>
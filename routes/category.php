<?php

Route::prefix('category')->group(function () {
    Route::get('/','CategoryController@getCategory');

    Route::get('add','CategoryController@getAddCategory');
    Route::post('add','CategoryController@postAddCategory');

    Route::get('edit/{id}','CategoryController@getEditCategory');
    Route::post('edit/{id}','CategoryController@postEditCategory');

    Route::get('delete/{id}','CategoryController@getDelete');
});

?>
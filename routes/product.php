<?php

Route::prefix('product')->group(function () {
    Route::get('/','ProductController@getProduct');

    Route::get('add','ProductController@getAddProduct');
    Route::post('add','ProductController@postAddProduct');

    Route::get('edit/{id}','ProductController@getEditProduct');
    Route::post('edit/{id}','ProductController@postEditProduct');

    Route::get('delete/{id}','ProductController@getDeleteProduct');

    Route::get('search','ProductController@Search');

    
});

?>
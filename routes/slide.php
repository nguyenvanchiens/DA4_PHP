<?php

Route::prefix('slide')->group(function () {
    Route::get('/','SlideController@getSlide');

    Route::get('add','SlideController@getAddSlide');
    Route::post('add','SlideController@postAddSlide');

    Route::get('edit/{id}','SlideController@getEditSlide');
    Route::post('edit/{id}','SlideController@postEditSlide');

    Route::get('delete/{id}','SlideController@getDelete');
});

?>
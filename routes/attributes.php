<?php
    Route::group(['prefix'=>'attributes'],function(){
      
        Route::get('add_values','AttributesController@getValues');
    });
?>
<?php

Route::group(['prefix'=>'order'],function(){
    Route::get('/','OrderController@index');
    Route::get('vieworder/{id}','OrderController@viewOrder');
    Route::get('orderprocessing/{id}','OrderController@orderprocessing');

    Route::get('assigned','OrderController@Assigned');
    Route::get('statistical','OrderController@Statistical');


    Route::get('delivery/{id}','OrderController@Delivery');
    Route::get('showdelevery','OrderController@getdelivery');

    Route::get('succes/{id}','OrderController@succes');

    Route::get('view_order_succes','OrderController@showOrderSucces');
    Route::get('view_order_deleted','OrderController@showOrderDeleted');
    Route::get('send-mail','OrderController@send_mail');
    Route::get('DeleteOrder/{id}','OrderController@DeleteOrder');

    Route::get('revenuebyday','OrderController@revenueByDay');
    Route::get('revenueByMonth','OrderController@revenueByMonth');
    Route::get('revenuebyyear','OrderController@revenueByYear');

    Route::get('Calculatorevenue','OrderController@Calculatorevenue');
});

?>
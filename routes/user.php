<?php
    Route::prefix('user')->group(function () {
        Route::get('/','UserController@getUser');

        Route::get('add','UserController@getAddUser');
        Route::post('add','UserController@postAddUser');

        Route::get('edit/{id}','UserController@getEditUser');
        Route::post('edit/{id}','UserController@postEditUser');

        Route::get('delete/{id}','UserController@getDeleteUser');
    });
?>
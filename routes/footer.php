<?php
    Route::prefix('footer')->group(function () {
        Route::get('/','FooterController@index');
    });
?>
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



include 'frontend.php';

Route::group(['namespace'=>'Admin'],function(){
    Route::group(['prefix'=>'login','middleware'=>'checklogin'],function(){
        Route::get('/','LoginController@getLogin');
        Route::post('/','LoginController@postLogin');       
    });
    Route::get('logout','HomeController@getLogout');
    
    Route::group(['prefix'=>'admin','middleware'=>'checklogout'],function(){
    Route::get('/','HomeController@getHome');
    include 'category.php';
    include 'product.php';
    include 'user.php';
    include 'slide.php';
    include 'setting.php';
    include 'order.php';
    include 'footer.php';
    include 'attributes.php';
    });
});

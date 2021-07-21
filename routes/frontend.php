<?php
//trang chủ
Route::get('/','HomeController@getHome');
//tìm kiếm sp
Route::get('search','HomeController@searchProduct');
//lấy sản phẩm theo loại
Route::get('categorydetail/{slug}/{id}','CategoryController@getCategoryDetail');
//lấy sản phẩm theo id
Route::get('productdetail/{slug}/{id}','ProductController@getProductDetail');
Route::get('contact','ContactController@index');

Route::get('profile/{id}','HomeController@getProfile');
Route::post('profile/{id}','HomeController@postProfile');

Route::get('vieworder_customer/{id}','CheckOutController@viewOrderCustomer');

Route::get('delete_order/{id}','CheckOutController@deletOrder');
Route::get('repurchase/{id}','CheckOutController@Repurchase');
Route::prefix('cart')->group(function () {
    //hiện thị cart
    Route::get('','CartController@showCart');
    //add to cart
    Route::get('addtocart/{id}','CartController@Addtocart');
    Route::get('add_cart_detail','CartController@AddCartDetail');
    //update cart
    Route::get('updatecart','CartController@UpdateCart');
    //delete cart
    Route::get('deletecart','CartController@DeleteCart');
    //checkout
    Route::get('checkout','CartController@CheckOut');
    //thanh toán
    Route::post('payment','CartController@Payment');
    //success
    Route::get('payment_success','CartController@payment_success');
    //demo
    Route::get('demo','CartController@views');
    
});

Route::get('login_checkout','CheckLoginController@checkLogin');
Route::post('add_customer','CheckLoginController@AddCustomer');



Route::post('login_user','CheckLoginController@Login');
Route::get('logout_user','CheckLoginController@Logout');
Route::get('sendemail','CartController@sendemail');


?>

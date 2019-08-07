<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['domain' => env('DOMAIN_FRONTEND' ,'newbie.us')], function (){
    Route::get('/index', 'PageController@getIndex')->name('index');

    Route::get('/product-types/{type}', 'PageController@getLoaiSp')->name('product_type');

    Route::get('/product-details/{id}', 'PageController@getChitiet')->name('product_details');

    Route::get('/add-to-cart/{id}', 'PageController@getAddtoCart')->name('add_to_cart');

    Route::get('/delete-cart/{id}', 'PageController@getDelItemCart')->name('delete_cart');

    Route::get('/intro', 'PageController@getGioiThieu')->name('intro');

    Route::get('/book-cart' , 'PageController@getCheckout')->name('book_cart');

    Route::post('/book-cart', 'PageController@postCheckout')->name('book_cart');

    Route::get('/contact', 'PageController@getLienHe')->name('contact');

    Route::get('/login', 'PageController@getLogin')->name('login');

    Route::post('/login' , 'PageController@postLogin')->name('login');

    Route::get('/signin', 'PageController@getSignin')->name('signin');

    Route::post('/signin', 'PageController@postSignin')->name('signin');

    Route::get('/logout', 'PageController@postLogout')->name('logout');

    Route::get('/redirect', 'SocialAuthController@redirect')->name('loginfb');

    Route::get('/callback', 'SocialAuthController@callback')->name('infor_fbuser');

    Route::get('/paypal', 'PaypalController@index')->name('get_paypal)');

    Route::get('/status', 'PaypalController@status')->name('return_status');
});

/* ================== Homepage + Admin Routes ================== */

require __DIR__.'/admin_routes.php';

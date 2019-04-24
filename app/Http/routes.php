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

Route::get('index', [
	'as' => 'trang-chu',
	'uses' => 'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}', [
	'as' => 'loaisanpham',
	'uses' => 'PageController@getLoaiSp'
]);

Route::get('chi-tiet-san-pham/{id}' ,[
	'as' => 'chitietsanpham',
	'uses' => 'PageController@getChitiet'
]);

Route::get('them-gio-hang/{id}', [
	'as' =>'themgiohang',
	'uses' => 'PageController@getAddtoCart'
]);

Route::get('del-cart/{id}', [
	'as' => 'xoagiohang',
	'uses' => 'PageController@getDelItemCart'
]);

Route::get('gioi-thieu', [
	'as' => 'gioithieu',
	'uses' => 'PageController@getGioiThieu'
]);

Route::get('dat-hang' ,[
	'as' =>'dathang',
	'uses' => 'PageController@getCheckout'
]);

Route::post('dat-hang', [
	'as' => 'dathang',
	'uses' => 'PageController@postCheckout'
]);

Route::get('lien-he', [
	'as' => 'lienhe',
	'uses' => 'PageController@getLienHe'
]);

Route::get('dang-nhap', [
	'as' => 'login',
	'uses' => 'PageController@getLogin'
]);

Route::post('dang-nhap', [
	'as' => 'login',
	'uses' => 'PageController@postLogin'
]);

Route::get('dang-ky', [
	'as' =>'signin',
	'uses' => 'PageController@getSignin'
]);

Route::post('dang-ky', [
	'as' => 'signin',
	'uses' => 'PageController@postSignin'
]);

Route::get('dang-xuat', [
	'as' => 'logout',
	'uses' => 'PageController@postLogout'
]);

/* ================== Homepage + Admin Routes ================== */

require __DIR__.'/admin_routes.php';

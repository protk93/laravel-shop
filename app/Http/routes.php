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
*/!
Route::get('/' ,['as' => 'index','uses'   => 'IndexController@index']);	

Route::group(['prefix'=>'admin','middleware' => 'auth'], function() {
	Route::group(['prefix'=>'cate'], function() {
		Route::get('list' ,['as'        => 'admin.cate.list','uses'      => 'CateController@getList']);
		Route::get('add' ,['as'         => 'admin.cate.getAdd','uses'    => 'CateController@getAdd']);	
		Route::post('add' ,['as'        => 'admin.cate.postAdd','uses'   => 'CateController@postAdd']);
		Route::get('delete/{id}' ,['as' => 'admin.cate.getDelete','uses' => 'CateController@getDelete']);
		Route::get('edit/{id}' ,['as'   => 'admin.cate.getEdit','uses'   => 'CateController@getEdit']);	
		Route::post('edit/{id}' ,['as'  => 'admin.cate.postEdit','uses'  => 'CateController@postEdit']);
	});

	Route::group(['prefix'          => 'product'], function() {
		Route::get('list' ,['as'        => 'admin.product.list','uses'      => 'ProductController@getList']);
		Route::get('add' ,['as'         => 'admin.product.getAdd','uses'    => 'ProductController@getAdd']);	
		Route::post('add' ,['as'        => 'admin.product.postAdd','uses'   => 'ProductController@postAdd']);
		Route::get('delete/{id}' ,['as' => 'admin.product.getDelete','uses' => 'ProductController@getDelete']);
		Route::get('edit/{id}' ,['as'   => 'admin.product.getEdit','uses'   => 'ProductController@getEdit']);	
		Route::post('edit/{id}' ,['as'  => 'admin.product.postEdit','uses'  => 'ProductController@postEdit']);
		Route::post('del-img/{id}' ,['as' => 'admin.product.getDelImg','uses'   => 'ProductController@getDelImg']);
	});

	Route::group(['prefix'          => 'user'], function() {
		Route::get('list' ,['as'        => 'admin.user.list','uses'      => 'UserController@getList']);
		Route::get('add' ,['as'         => 'admin.user.getAdd','uses'    => 'UserController@getAdd']);	
		Route::post('add' ,['as'        => 'admin.user.postAdd','uses'   => 'UserController@postAdd']);
		Route::get('delete/{id}' ,['as' => 'admin.user.getDelete','uses' => 'UserController@getDelete']);
		Route::get('edit/{id}' ,['as'   => 'admin.user.getEdit','uses'   => 'UserController@getEdit']);	
		Route::post('edit/{id}' ,['as'  => 'admin.user.postEdit','uses'  => 'UserController@postEdit']);	
	});
});
Route::get('auth/login' ,['as'  => 'auth.getLogin','uses'   => 'Auth\AuthController@getLogin']);	
Route::post('auth/login' ,['as' => 'auth.postLogin','uses'  => 'Auth\AuthController@postLogin']);
Route::get('auth/logout' ,['as' => 'auth.getLogout','uses'   => 'Auth\AuthController@getLogout']);	
Route::get('loai-san-pham/{id}/{name}' ,['as' => 'productCate','uses'   => 'IndexController@productCate']);
Route::get('chi-tiet-san-pham/{id}/{name}' ,['as' => 'productDetail','uses'   => 'IndexController@productDetail']);
Route::get('lien-he' ,['as' => 'getContact','uses'   => 'IndexController@getContact']);
Route::post('lien-he' ,['as' => 'postContact','uses'   => 'IndexController@postContact']);
Route::get('mua-hang/{id}/{name}' ,['as' => 'order','uses'   => 'IndexController@order']);
Route::get('gio-hang' ,['as' => 'listCart','uses'   => 'IndexController@listCart']);
Route::get('xoa-san-pham/{id}' ,['as' => 'delProduct','uses'   => 'IndexController@delProduct']);
Route::post('update-gio-hang/{id}/{qty}' ,['as' => 'updateCart','uses'   => 'IndexController@updateCart']);
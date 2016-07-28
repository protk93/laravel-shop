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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin'], function() {
	Route::group(['prefix'=>'cate'], function() {
		Route::get('list' ,['as'  => 'admin.cate.list','uses'  => 'CateController@getList']);
		Route::get('add' ,['as'  => 'admin.cate.getAdd','uses'  => 'CateController@getAdd']);	
		Route::post('add' ,['as' => 'admin.cate.postAdd','uses' => 'CateController@postAdd']);
	});
});
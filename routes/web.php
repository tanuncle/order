<?php

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

Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//用户功能
Route::group(['namespace' => 'User', 'prefix' => 'user', 'middleware' => 'auth'], function (){
    Route::get('/', 'HomeController@index');
    //早餐
    Route::get('/breakfast', 'BreakfastController@index');
    Route::get('/breakfast/create', 'BreakfastController@create');
    Route::get('/profile', 'ProfileController@index');
});

//食堂工作人员功能
Route::group(['namespace' => 'Staff', 'prefix' => 'staff', 'middleware' => 'auth'], function (){
    Route::get('/', 'HomeController@index');
    //菜单
    Route::resource('/menu', 'MenuController');
    //定餐时限
    Route::resource('/limit', 'LimitController');
    //用户搜索功能，search顺序要放在UserController@show之前
    Route::get('/order/search', 'OrderController@search');
    //员工开停餐
    Route::resource('/order', 'OrderController');
    Route::get('/breakfast', 'BreakfastController@index');
    Route::get('/breakfast/create', 'BreakfastController@create');
    Route::get('/profile', 'ProfileController@index');
});

//管理员功能
Route::group(['namespace' => 'admin', 'prefix' => 'admin', 'middleware' => 'auth'], function (){
    Route::get('/', 'HomeController@index');
    Route::resource('/dept', 'DeptController');
    //个人餐费标准历史
    Route::get('/user/price/{id}/edit', 'PriceUserController@edit');
    Route::put('/user/price/{id}', 'PriceUserController@update');
    //用户搜索功能，search顺序要放在UserController@show之前
    Route::get('/user/search', 'UserController@search');
    Route::resource('/user', 'UserController');
    Route::resource('/fee', 'FeeController');

});
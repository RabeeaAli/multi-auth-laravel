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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::any('/home/logout', 'HomeController@userLogout')->name('home.logout');


Route::get('/admin/login', 'AdminAuthController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'AdminAuthController@submit')->name('admin.submit');

Route::group(['prefix' => 'admin','middleware'=>'auth:admin'], function () {
    
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::any('/logout', 'AdminController@adminLogout')->name('admin.logout');
    
    Route::get('/post', 'PostController@index')->name('post.index');

});



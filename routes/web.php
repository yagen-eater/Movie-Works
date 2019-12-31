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

// トップページ
Route::get('/', 'UsersController@index');
Route::post('/', 'UsersController@index');

// 新規登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン・ログアウト
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::resource('users', 'UsersController', ['only' => ['show']]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('users', 'UsersController@edit')->name('users.edit');
    Route::post('users', 'UsersController@update')->name('users.update');
    Route::resource('jobinfo', 'JobInfoController', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
});
Route::resource('jobinfo', 'JobInfoController', ['only' => ['show']]);

//応募書類アップロード
Route::get('upload/{id}', 'UploadController@add')->name('upload.add');
Route::post('upload/{id}', 'UploadController@store')->name('upload.store');
Route::get('upload/show/{id}', 'UploadController@show')->name('upload.show');

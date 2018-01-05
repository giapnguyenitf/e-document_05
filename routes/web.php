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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->name('index');

Route::get('/user/profile', 'UserController@viewProfile')->name('profile');

Route::post('/user/profile/update', 'UserController@updateProfile')->name('update.profile');

Route::post('/user/profile/changepassword', 'UserController@changePassword')->name('update.password');

Route::get('/user/upload', 'UserController@viewUpload')->name('upload');

Route::post('/user/upload', 'UserController@uploadDocument')->name('user.upload');

Route::get('/document', function(){
    return view('viewDocument');
});

Route::get('/user/downloaded', function () {
    return view('user.downloaded');
})->name('downloaded');

Route::get('/user/favorites', function () {
    return view('user.favorites');
})->name('favorites');

Route::get('/user/coins', function() {
    return view('user.buyCoins');
})->name('buyCoins');

Route::get('/ajax-categories', 'UserController@getCategories');
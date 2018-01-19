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

Route::get('/', 'HomeController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/category/{id}', 'CategoryDocumentController@index')->name('category');

Route::get('info/{id}', 'ShowUserController@index')->name('showUser');

Route::prefix('get')->group(function () {
    Route::get('categories', 'AjaxController@getCategories');
    Route::get('request-friend', 'AjaxController@getRequestFriend');
});

Route::prefix('user')->group(function () {
    Route::resource('profile', 'UserController');
    Route::post('update-pwd', 'UpdatePasswordController@update')->name('password.update');
    Route::resource('document', 'DocumentController');
});

Route::prefix('friend')->group(function () {
    Route::get('add/{id}', 'FriendController@create')->name('addFriend');
    Route::get('delete/{id}', 'FriendController@delete')->name('deleteFriend');
    Route::get('accept/{id}', 'FriendController@update')->name('acceptFriend');
    Route::get('list', 'FriendController@show')->name('friendsList');
    Route::get('requests', 'FriendController@showRequests')->name('friendsRequests');
});

Route::prefix('document')->group(function () {
    Route::get('view/{id}', 'ViewDocumentController@index')->name('viewDocument');
    Route::get('favorites/{id}', 'ViewDocumentController@favorites')->name('favoritesDocument');
    Route::get('unfavorites/{id}', 'ViewDocumentController@unFavorites')->name('unFavoritesDocument');
    Route::get('download/{id}', 'ViewDocumentController@download')->name('downloadDocument');
});

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

Route::get('/addalbum',function(){
	return view('album.add')->with('user', Auth::user());
});
Route::get('/addsong',function(){
	return view('song.add')->with('user', Auth::user());
});

Route::post('addalbum','AlbumController@create');
Route::post('uploadcrop','AlbumController@uploadcrop');



Route::get('/player',function(){
	return view('player');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('/album/{user}', 'AlbumController@index')->name('album.show');


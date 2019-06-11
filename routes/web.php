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




/*
Route::get('/addsong/{albumid}',function(){
	return view('song.add')->with('user', Auth::user());
});
*/

Route::post('addalbum','AlbumController@create');
Route::post('uploadcrop','AlbumController@uploadcrop');
Route::post('addsong','SongController@create');
Route::post('userprofile','UsersprofileController@editprofile');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('/album/{user}', 'AlbumController@index')->name('album.show');
Route::get('/hub/{user}', 'AlbumController@showhub');
Route::get('/addtoplaylist/{songid}', 'AlbumController@addtoplaylist');
Route::get('/playlist', 'AlbumController@showplaylist');
Route::get('/notifications', 'AlbumController@shownotifications');


Route::get('/directory', 'AlbumController@showall');

Route::get('/addsong/{user}/{albumid}', 'SongController@addsong');

Route::get('/fetchsongs/{albumid}', 'AlbumController@fetchsongs')->name('album.show');

Route::get('/homeuser/{user}', 'HomeController@showall');


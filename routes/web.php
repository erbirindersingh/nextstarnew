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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('/album/{user}', 'AlbumController@index')->name('album.show');
<<<<<<< HEAD
=======
<<<<<<< HEAD
Route::get('/directory', 'AlbumController@showall');
=======
Route::get('/addsong/{user}/{albumid}', 'SongController@addsong');


>>>>>>> 587838e207b4c1528cd38fe614234966ac7769a1

>>>>>>> 278e8e0f95dd49ba40064639e3a88de9a4d25ba5

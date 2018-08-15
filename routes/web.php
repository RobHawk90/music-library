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
})->name('home')->middleware('auth');

Route::get('/permission', 'LoginController@permission');

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

Route::get('/artists', 'ArtistController@index');
Route::get('/artists/create', 'ArtistController@create')->middleware('access.user');
Route::get('/artists/{id}', 'ArtistController@show');
Route::get('/artists/edit/{artist}', 'ArtistController@edit')->middleware('access.user');
Route::post('/artists', 'ArtistController@store')->middleware('access.user');
Route::put('/artists/{artist}', 'ArtistController@update')->middleware('access.user');
Route::delete('/artists/{artist}', 'ArtistController@destroy')->middleware('access.user');

Route::get('/albums', 'AlbumController@index');
Route::get('/albums/create', 'AlbumController@create')->middleware('access.user');
Route::get('/albums/{id}', 'AlbumController@show');
Route::get('/albums/edit/{album}', 'AlbumController@edit')->middleware('access.user');
Route::post('/albums', 'AlbumController@store')->middleware('access.user');
Route::put('/albums/{album}', 'AlbumController@update')->middleware('access.user');
Route::delete('/albums/{album}', 'AlbumController@destroy')->middleware('access.user');

Route::get('/songs', 'MusicController@index');
Route::get('/musics/{music}', 'MusicController@show');
Route::post('/musics', 'MusicController@store')->middleware('access.user');
Route::put('/musics', 'MusicController@update')->middleware('access.user');
Route::delete('/musics/{music}', 'MusicController@destroy')->middleware('access.user');

Route::get('/users', 'UserController@index');
Route::get('/users/create', 'UserController@create')->middleware('access.admin');
Route::get('/users/edit/{user}', 'UserController@edit')->middleware('access.admin');
Route::post('/users', 'UserController@store')->middleware('access.admin');
Route::put('/users/{user}', 'UserController@update')->middleware('access.admin');
Route::delete('/users/{user}', 'UserController@destroy')->middleware('access.admin');

Route::post('/search', 'SearchController@search');

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
Route::get('images/{filename}', function ($filename) {
    $path = storage_path('app/images/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});


Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');
Route::get('/user', function () {
    return auth()->user();
});
Route::post('/search', 'SearchController@search');

foreach (['en', 'pt-BR'] as $locale) {
    Route::get("$locale/login", 'LoginController@index')->name('login');

    Route::prefix("api/$locale")->group(function () {
        Route::resources([
            'albums' => 'Api\\AlbumController',
            'artists' => 'Api\\ArtistController',
            'songs' => 'Api\\SongController',
            'users' => 'Api\\UserController',
        ]);
    });
}

Route::get('/{vue_router?}', function () {
    return view('welcome');
})
->where('vue_router', '[\/\w\.-]*')
->name('home');


Route::get('/permission', 'LoginController@permission');

// Route::delete('/users/{user}', 'UserController@destroy')->middleware('access.admin');

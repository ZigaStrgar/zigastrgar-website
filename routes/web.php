<?php

Route::get('/', 'PagesController@index');
Route::get('contact', 'PagesController@contact');

Auth::routes();

Route::resource('blog', 'ArticlesController');
Route::resource('skills', 'SkillsController');
Route::resource('categories', 'CategoriesController'); // TODO Implement the other two views also
Route::resource('biography', 'BiographyController', [ 'except' => [ 'show' ] ]);
Route::resource('portfolio', 'PortfoliosController', [ 'except' => [ 'show' ] ]);

Route::group([ 'middleware' => [ 'auth' ] ], function() {
    Route::get('dashboard', 'PagesController@dashboard');
});

Route::get('images/{filename}', function($filename) {
    $path = storage_path() . '/app/public/images/' . $filename;

    if ( !File::exists($path) )
        abort(404, "I'm not here!");
    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});
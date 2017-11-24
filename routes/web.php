<?php

Route::get('/', 'PagesController@index');
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::get('contact', 'PagesController@contact');
Route::post('sendMessage', 'PagesController@sendMessage');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

//Route::resource('blog', 'ArticlesController');
Route::resource('skills', 'SkillsController');
Route::resource('categories', 'CategoriesController'); // TODO Implement the other two views also
Route::resource('biography', 'BiographyController', [ 'except' => [ 'show' ] ]);
Route::resource('portfolio', 'PortfoliosController', [ 'except' => [ 'show' ] ]);
//Route::resource('comments', 'CommentsController', [ 'except' => [ 'show', 'index', 'create' ] ]);
//Route::resource('courses', 'CoursesController', [ 'only' => [ 'index', 'show' ] ]);

Route::group([ 'middleware' => [ 'auth' ] ], function() {
    Route::get('dashboard', 'PagesController@dashboard');
});

Route::get('images/{filename}', function($filename) {
    return Image::make(storage_path('app/public/images/' . $filename))->response();
});

Route::get('attachment/{filename}', function($filename) {
    $extension = collect(explode(".", $filename))->last();
    $name      = \App\Attachment::where('path', 'LIKE', '%' . $filename)->first()->name;

    return response()->download(storage_path('/app/public/attachments/' . $filename), $name . "." . $extension);
});
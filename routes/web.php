<?php

use Illuminate\Support\Facades\Artisan;

Route::get('/', 'PagesController@index');
Route::get('contact', 'PagesController@contact');

Auth::routes();

Route::resource('blog', 'ArticlesController');
Route::resource('skills', 'SkillsController');
Route::resource('categories', 'CategoriesController'); // TODO Implement the other two views also
Route::resource('biography', 'BiographyController', [ 'except' => [ 'show' ] ]);
Route::resource('portfolio', 'PortfoliosController', [ 'except' => [ 'show' ] ]);

Route::get('migrate', function() {
    Artisan::call('migrate', [ '--seed' => 1 ]);

    return redirect("/");
});

Route::group([ 'middleware' => [ 'auth' ] ], function() {
    Route::get('dashboard', 'PagesController@dashboard');
});
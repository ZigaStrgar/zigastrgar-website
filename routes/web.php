<?php

use Illuminate\Support\Facades\Artisan;

Route::get('/', 'PagesController@index');
Route::get('contact', 'PagesController@contact');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

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
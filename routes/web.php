<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $categories = Category::all();
    return view('home', compact('categories'));
})->name('home');

Route::resource('category', CategoryController::class);

// Route::resource('posts', PostController::class);

Route::get('/posts', 'App\Http\Controllers\PostController@index')->name('posts.index');


Route::get('/posts/{slug}', 'App\Http\Controllers\PostController@show')->name('posts.slug');
Route::put('/posts/publish/{post}', 'App\Http\Controllers\PostController@publish')->name('posts.publish');
Route::get('/posts?id={id}', 'App\Http\Controllers\PostController@index')->name('posts.category');


Route::get('/mypost', 'App\Http\Controllers\UserController@show')->name('mypost');

Route::get('/login', 'App\Http\Controllers\Auth\AuthContoller@login')->name('login')
    ->middleware('guest');
Route::post('/login', 'App\Http\Controllers\Auth\AuthContoller@authenticate')->name('login.user');
Route::get('/register', 'App\Http\Controllers\Auth\AuthContoller@register')->name('register')
    ->middleware('guest');
Route::post('/register', 'App\Http\Controllers\Auth\AuthContoller@store')->name('register.user');

Route::middleware(['auth'])->group(function () {
    Route::get('/post/create', 'App\Http\Controllers\PostController@create')->name('posts.create');
    Route::post('/post/store', 'App\Http\Controllers\PostController@store')->name('posts.store');
    Route::get('/post/{post}/edit', 'App\Http\Controllers\PostController@edit')->name('posts.edit');
    Route::put('/post/{post}/update', 'App\Http\Controllers\PostController@update')->name('posts.update');
    Route::delete('/post/{post}/destroy', 'App\Http\Controllers\PostController@destroy')->name('posts.destroy');

    Route::get('/logout', 'App\Http\Controllers\Auth\AuthContoller@logout')->name('logout');

    Route::get('/profile', 'App\Http\Controllers\UserController@index')->name('profile');
    Route::get('/profile/edit', 'App\Http\Controllers\UserController@edit')->name('profile.edit');
    Route::put('/profile/update/{user}', 'App\Http\Controllers\UserController@update')->name('profile.update');
    Route::get('/changepassword', 'App\Http\Controllers\UserController@changePassword')->name('changepassword');
    Route::put('/updatepassword/{user}', 'App\Http\Controllers\UserController@updatePassword')->name('updatepassword');
});

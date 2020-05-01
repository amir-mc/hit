<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();


//++up code++ YOUR CACHE .env FILE SHOULD DELETE too important
Route::middleware(['auth'])->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('Categories','CategoriesController');
    Route::resource('posts','PostsController');
    Route::resource('tags','TagController');
    Route::get('trash-post','PostsController@trash')->name('trash.posts.index');
    Route::put('restore/{post}','PostsController@restore')->name('post.restore');
//php artisan config:cache
});





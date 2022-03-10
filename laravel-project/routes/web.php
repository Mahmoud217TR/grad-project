<?php

use App\Http\Controllers\CodeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SnippetController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaggingController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('code', CodeController::class);
Route::resource('comment', CommentController::class);
Route::resource('language', LanguageController::class);
Route::resource('post', PostController::class);
Route::resource('snippet', SnippetController::class);
Route::resource('tag', TagController::class);
Route::resource('profile', ProfileController::class)->except(['create','store']);

Route::controller(TaggingController::class)->group(function(){
    Route::post('post/{pid}/tag','post_tags')->name('tag-post');
    Route::post('snippet/{sid}/tag','snippet_tags')->name('tag-snippet');
});

Route::get('/nav', function () {
    return view('layouts.nav');
});

Route::get('/footer', function () {
    return view('layouts.footer');
});
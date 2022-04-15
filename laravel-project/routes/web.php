<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SnippetController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaggingController;
use App\Http\Controllers\CompilerController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SheetController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\VotesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use function Clue\StreamFilter\fun;

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

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('code', CodeController::class);
Route::controller(CodeController::class)->group(function(){
    Route::get('/requested/code','requested')->name('code.requested');
});
Route::resource('comment', CommentController::class);
Route::resource('language', LanguageController::class);
Route::controller(LanguageController::class)->group(function(){
    Route::get('/requested/language','requested')->name('language.requested');
});
Route::resource('post', PostController::class);
Route::resource('snippet', SnippetController::class);
Route::controller(SnippetController::class)->group(function(){
    Route::get('/requested/snippet','requested')->name('snippet.requested');
});
Route::resource('tag', TagController::class);
Route::resource('sheet', SheetController::class);
Route::resource('profile', ProfileController::class)->except(['create','store']);

Route::controller(TaggingController::class)->prefix('tagging')->group(function(){
    Route::post('/post','post_tags')->name('tag-post');
    Route::post('/snippet','snippet_tags')->name('tag-snippet');
    Route::post('/sheet','sheet_tags')->name('tag-sheet');
});

Route::controller(VotesController::class)->prefix('vote')->group(function(){
    Route::post('/post','voteOnPost')->name('post-vote');
    Route::post('/comment','voteOnComment')->name('comment-vote');
});

Route::controller(FollowingController::class)->group(function(){
    Route::post('follow','follow')->name('follow');
    Route::post('getfollow','getFollowStatus')->name('get-follow');
});

Route::post('/upload',[UploadController::class,'uploadImg'])->name('upload-img');

Route::controller(Controller::class)->group(function(){
    Route::get('/','welcome')->name('welcome');
    Route::get('/services','services')->name('services');
    Route::get('/about-us','about')->name('about');
    Route::get('/code-editor', 'editor')->name('editor');

});

Route::post('/compile',[CompilerController::class,'getResult'])->name('compile');

Route::controller(SearchController::class)->group(function(){
    Route::get('/search','search')->name('search');
});

Route::controller(AdminController::class)->prefix('admin')->group(function(){
    Route::get('/panel','panel')->name('panel');
    Route::get('/logs','logs')->name('logs');
    Route::get('/log/{log}','log')->name('log.show');
});


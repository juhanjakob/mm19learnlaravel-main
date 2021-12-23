<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class,'index']);
Route::get('/articles', [HomeController::class,'articles']);
Route::get('/articles/{article}', [HomeController::class,'article'])->whereNumber("article")->name("article");
Route::get('/articles/tags/{tag}', [HomeController::class, 'tag']);
Route::get('/articles/author/{author}', [HomeController::class, 'author']);

//Route::get('/admin/articles', [ArticleController::class,'index']);
//Route::get('/admin/articles/create', [ArticleController::class,'create']);
//Route::post('/admin/articles', [ArticleController::class,'store']);
//Route::get('/admin/articles/{article}/show', [ArticleController::class,'show']);
//Route::get('/admin/articles/{article}/edit', [ArticleController::class,'edit']);
//Route::post('/admin/articles/{article}', [ArticleController::class,'update']);
//Route::get('/admin/articles/{article}/delete', [ArticleController::class,'destroy']);



Route::middleware(['auth'])->group(function() {
    Route::resource('/admin/articles', ArticleController::class);
    Route::get('/articles/{article}/like', [\App\Http\Controllers\LikeController::class, 'store']);
    Route::post('/article/{article}', [\App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');
    Route::get('/user/profile', function() {
        return view('profile');
    })->name('profile');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ArticleController;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $articles = Article::all();
    $categories = Category::all();
    $tags = Tag::all();
    return view('welcome', compact('articles','categories', 'tags'));
});

Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);
Route::resource('articles', ArticleController::class);

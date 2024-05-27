<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/article', [ArticleController::class, 'readArticle']);

Route::get('/create', [ArticleController::class, 'createArticle']);
Route::post('/create/traitement', [ArticleController::class, 'create_article_traitement']);




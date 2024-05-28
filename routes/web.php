<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/article', [ArticleController::class, 'readArticle']);


Route::get('/create', [ArticleController::class, 'createArticle']);
Route::post('/create/traitement', [ArticleController::class, 'createArticleTreatment']);

Route::get('/update/{id}', [ArticleController::class, 'updateArticle']);
Route::post('/update/traitement', [ArticleController::class, 'updateArticleTreatment']);

Route::get('/delete/{id}', [ArticleController::class, 'deleteArticle']);





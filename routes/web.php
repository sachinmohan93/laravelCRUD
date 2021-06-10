<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticlesController;


Route::get('/', [ArticlesController::class,'index']);
Route::get('/addnew', [ArticlesController::class,'create']);
Route::post('/articles', [ArticlesController::class,'store']);
Route::get('/article/details/{id}', [ArticlesController::class,'show']);
Route::get('/article/edit/{id}', [ArticlesController::class,'edit']);
Route::put('/article/{id}', [ArticlesController::class,'update']);
Route::get('/article/delete/{id}', [ArticlesController::class,'destroy']);









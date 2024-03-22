<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [NewsController::class, 'index']);

// Route::get('/article/{title}/{id}', function ($title, $id) {
//   return view('article/article', [
//     'title' => $title,
//     'id' => $id
//   ]);
// });

Route::get('/article/{title}/{id}',[NewsController::class, 'article']);

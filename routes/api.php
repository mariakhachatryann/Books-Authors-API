<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthorsController;


Route::prefix('v1')->group(function () {
    Route::apiResource('books', BooksController::class);
    Route::apiResource('authors', AuthorsController::class);
    Route::apiResource('orders', OrderController::class);

//    Route::get('/books-authors', [BooksController::class, 'authors'])->name('books.authors');
});

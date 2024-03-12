<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
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
    return view('booksList', ['books' => Book::get()]);
})->name('home');

// Route::get('/addBook', function () {
//     return view('addBook');
// })->name('books.add');

// Route::post('/bookStore', [BookController::class, 'store'])->name('books.store');
Route::resource('/books', BookController::class);

Route::resource('/authors', AuthorController::class);
// Route::post('/addAuthor', [AuthorController::class, 'create'])->name('authors.add');
// Route::get('/books', function () {
//     return Book::get();
// });
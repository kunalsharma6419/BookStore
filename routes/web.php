<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Http\Controllers\BookController;

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

// Route::get('/', function ($id) {
//     $book = Book::findOrFail($id);
//     return view('index');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('books');
Route::get('/books/{book}', 'App\Http\Controllers\BookController@show')->name('books.show');
Route::get('search', [BookController::class, 'search'])->name('search');
Route::get('searchbooks', [BookController::class, 'searchbooks'])->name('searchbooks');
Route::get('storebooks', [BookController::class, 'storebooks'])->name('storebooks');
Route::get('store', [BookController::class, 'store']);
Route::get('/books/{id}/edit', 'App\Http\Controllers\BookController@edit')->name('books.edit');
Route::put('/books/{id}', 'App\Http\Controllers\BookController@update')->name('books.update');
Route::delete('/books/{id}', 'App\Http\Controllers\BookController@destroy')->name('books.destroy');



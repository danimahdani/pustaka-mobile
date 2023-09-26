<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowedBookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;

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


// Route::get('/layout', function () {
//     return view('testcomponent.datatables');
// });

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', fn () => view('dashboard.index'));
    Route::resource('members', UserController::class)->except('show');
    Route::resource('categories', CategoryController::class)->except('show');
    Route::resource('books', BookController::class);
    Route::resource('borrowed-book', BorrowedBookController::class);
});

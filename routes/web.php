<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\User\BookController as UserBookController;
use App\Http\Controllers\User\BorrowingController;

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

Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])
    ->name('index');

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('profile', [\App\Http\Controllers\SiteController::class, 'profile'])
        ->middleware('password.confirm')
        ->name('profile');
});

Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard'); // atau kamu bisa ganti dengan controller kalau ada
    })->name('dashboard');

    Route::resource('books', BookController::class);
});


Route::middleware(['auth', 'verified'])->prefix('user')->name('user.')->group(function () {
    Route::get('/books', [UserBookController::class, 'index'])->name('books.index');
    Route::post('/books/{book}/borrow', [UserBookController::class, 'borrow'])->name('books.borrow');
});


Route::middleware(['auth', 'verified'])->prefix('user')->name('user.')->group(function () {
    Route::get('/books', [UserBookController::class, 'index'])->name('books.index');
    Route::post('/books/{book}/borrow', [UserBookController::class, 'borrow'])->name('books.borrow');

    // 🔽 Tambahan ini:
    Route::get('/borrowings', [BorrowingController::class, 'index'])->name('borrowings.index');
    Route::post('/borrowings/{borrowing}/return', [BorrowingController::class, 'return'])->name('borrowings.return');
});



<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KantinwkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;

// routes/web.php
Route::get('/', function () {
    return view('welcome');
});
Route::get('dashboard', function () {
    return view('dashboard');
});



// Routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::post('logout', function () {
        Auth::logout();
        return redirect('/dashboard');
    })->name('logout');

    Route::get('/kantinwks', [KantinwkController::class, 'index'])->name('kantinwks.index');
    Route::get('/kantinwks/create', [KantinwkController::class, 'create'])->name('kantinwks.create');
    Route::post('/kantinwks', [KantinwkController::class, 'store'])->name('kantinwks.store');
    Route::get('/kantinwks/{kantinwk}', [KantinwkController::class, 'show'])->name('kantinwks.show');
    Route::get('/kantinwks/{kantinwk}/edit', [KantinwkController::class, 'edit'])->name('kantinwks.edit');
    Route::put('/kantinwks/{kantinwk}', [KantinwkController::class, 'update'])->name('kantinwks.update');
    Route::delete('/kantinwks/{kantinwk}', [KantinwkController::class, 'destroy'])->name('kantinwks.destroy');
    Route::get('/pembeli', [KantinwkController::class, 'pembeliIndex'])->name('pembeli.index');
    Route::get('/beli/{id}', [KantinwkController::class, 'beli'])->name('beli');
    Route::post('/beli/{id}', [KantinwkController::class, 'processBeli'])->name('processBeli');

    // Routes for transactions
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::delete('/transactions/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
Route::delete('/transactions', [TransactionController::class, 'destroyAll'])->name('transactions.destroyAll');
});

// Routes for users
Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');

 // routes/web.php

use App\Http\Controllers\AuthController;

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/search', [KantinwkController::class, 'search'])->name('search');










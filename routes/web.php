<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\RatingsController;
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('albums.index');
    }
    return redirect()->route('register');
});
Route::get('/index', [AlbumsController::class, 'index'])->name('albums.index');
Route::get('/create', [AlbumsController::class, 'create'])->name('albums.create');
Route::post('/store', [AlbumsController::class, 'store'])->name('albums.store');
Route::get('/show/{id}', [AlbumsController::class, 'show'])->name('albums.show');
Route::get('/edit/{id}', [AlbumsController::class, 'edit'])->name('albums.edit');
Route::put('/update/{id}', [AlbumsController::class, 'update'])->name('albums.update');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/admin', function () {
    return 'Bienvenido Admin';
})->middleware('isAdmin')->name('admin.index');

Route::post('/albums/{albumId}/rating', [RatingsController::class, 'store'])
    ->middleware('auth')
    ->name('ratings.store');

require __DIR__.'/auth.php';

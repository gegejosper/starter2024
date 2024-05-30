<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfAuthenticated;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/hello', function () {
//     return 'hello';
// })->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/verify-email', [UserController::class, 'sendVerificationEmail'])->name('sendVerificationEmail');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/unknown_user', [FrontController::class, 'unknown_user']);
Route::prefix('panel')->name('panel.')->group(function() {
    Route::middleware('can:manage-admin')->prefix('admin')->name('admin.')->group(function() {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/users',  [UserController::class, 'show'])->name('users.show');
        Route::get('/users/{user_id}', [UserController::class, 'view'])->name('users.view');  
        Route::patch('/users/update', [UserController::class, 'update'])->name('users.update');  
        Route::patch('/users/modify', [UserController::class, 'modify'])->name('users.modify');  
    });
});
require __DIR__.'/auth.php';
//Auth::routes(['verify' => true]);
//Auth::routes(['verify' => true]);


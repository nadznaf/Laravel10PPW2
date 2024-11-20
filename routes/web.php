<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SendEmailController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('checkage', function () {
    return redirect()->route('dashboard')
        ->withSuccess('You are 18 yeard old or older.');
})->middleware('checkage');

Route::get('checkrole', function () {
    return redirect()->route('dashboard')
        ->withSuccess('You are an admin.');
})->middleware('checkrole');

Route::resource ('users', UserController::class);

Route::resource('gallery', GalleryController::class);

Route::get('send-email', [SendEmailController::class, 'index'])->name('send-email');

Route::post('post-email', [SendEmailController::class, 'store'])->name('post-email');

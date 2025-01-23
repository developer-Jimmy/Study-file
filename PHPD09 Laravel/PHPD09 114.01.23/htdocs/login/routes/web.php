<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\PhotoController;


Route::get('/locale/{locale?}', function($locale='en') {
    App::setLocale($locale);
    return __('hello');
});

Route::get('/setcookie', function() {
    Cookie::queue('name', 'David', 1);
});
Route::get('/getcookie', function() {
    return Cookie::get("name");
});

// 顯示圖片上傳表單
Route::view('/updateImage', 'updateImage');

// 處理圖片上傳
Route::post('/upload', [PhotoController::class, 'store'])->name('upload');

// 顯示上傳的圖片
Route::get('/imageView/{filename}', [PhotoController::class, 'show'])->name('image.view');


Route::view('/test', 'test');
Route::get('/cart', function() {
    // fetch data from DB
    return view('cart');
})->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/welcome', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('welcome');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

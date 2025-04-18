<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'main'])->name('index');
Route::get('/blogs', [PageController::class, 'blogs'])->name('blogs');
Route::get('/blog/{id}', [PageController::class, 'showBlog'])->name('blog.show');

Route::get('/admin/login', [AdminController::class, 'loginForm'])->name('admin.login.form');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/blogs', [BlogController::class, 'index'])->name('admin.blog.index');
    Route::post('/admin/blogs', [BlogController::class, 'store'])->name('admin.blog.store');
    Route::delete('/admin/blogs/{id}', [BlogController::class, 'destroy'])->name('admin.blog.destroy');
});

Route::post('/send-contact', [ContactController::class, 'send']);
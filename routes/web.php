<?php

// routes/web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BlogController;
use Illuminate\Support\Facades\Auth;

// Routes publiques
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produits', [HomeController::class, 'products'])->name('products');
Route::get('/produit/{slug}', [HomeController::class, 'productDetail'])->name('product.detail');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [HomeController::class, 'blogPost'])->name('blog.post');

// Routes d'authentification
Auth::routes(['register' => false]);

// Routes admin protégées
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Gestion des catégories
    Route::resource('categories', CategoryController::class);

    // Gestion des produits
    Route::resource('products', ProductController::class);

    // Gestion du blog
    Route::resource('blog', BlogController::class);
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;

// Pag principal
Route::get('/', function () {
    return view('home');
})->name('home');

// Productos
Route::get('/products', [ProductController::class, 'index'])->name('products'); // Cambié la ruta de products para que apunte al controlador :3

// Detalle del producto
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.detail');

// Contacto
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Foro / Novedades
Route::get('/forum', function () {
    return view('forum');
})->name('forum');

// Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Perfil usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

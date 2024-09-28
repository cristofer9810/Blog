<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

// nos redirige a la vista index.blade.php ↓↓ y esta      ↓↓↓   es el nombre de la URL que puede ser cualquiera
Route::get('/',[PostController::class, 'index'])->name('posts.index');
// esto  ↑↑ esta recibiendo un parametro que viene del controlador Post Controller

Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');

Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

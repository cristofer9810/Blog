<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

/* para hacer funcional esta carpeta se nesecita crear una linea de codigo en la direccion app/Providers/RouteServiceProvider.php
despues creamos una ruta con Route::resource('user', UserController::class); y creamos un controlador con:
php artisan make:controller (espesifico la carpeta y nombre delcontrolador y ademas espesifico donde quiero el controlador) ejemplo:
php artisan make:controller Admin\RoleController -r    el: -r crea el archivo nesesario para el crud
duespues usamos el USE para importar el controlador y le damos un nombre a la ruta con manes('Nombre.otraCarpeta')  */

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

Route::resource('tags', TagController::class)->except('show')->names('admin.tags');

Route::resource('posts', PostController::class)->except('show')->names('admin.posts');















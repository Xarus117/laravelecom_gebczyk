<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

route::get('/', [HomeController::class, 'index']); // Pagina principal

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect', [HomeController::class, 'redirect']); // Redirigir usuario
route::get('/view_category', [AdminController::class, 'view_category']); // Pagina principal
route::get('/order_by_desc', [HomeController::class, 'order_by_desc']); // Pagina principal
route::get('/order_by_asc', [HomeController::class, 'order_by_asc']); // Pagina principal
route::get('/delete_category/{id}', [AdminController::class, 'delete_category']); // Eliminar una categoría vía ID
route::post('/add_category', [AdminController::class, 'add_category']); // Añadir una categoría
route::get('/view_product', [AdminController::class, 'view_product']); // Ver un producto
route::post('/add_product', [AdminController::class, 'add_product']); // Añadir un producto
route::get('/show_product', [AdminController::class, 'show_product']); // Mostrar un producto
route::get('/delete_product/{id}', [AdminController::class, 'delete_product']); // Eliminar un producto vía ID
route::get('/update_product/{id}', [AdminController::class, 'update_product']); // Actualizar un producto vía ID
route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']); // Guardar los cambios editados
route::get('/product_details/{id}', [HomeController::class, 'product_details']); // Página de detalles del producto
route::post('/add_cart/{id}', [HomeController::class, 'add_cart']); // Añadir producto al carrito
route::get('/show_cart', [HomeController::class, 'show_cart']); // Mostrar vista del carrito
route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']); // Eliminar productos del carrito
route::get('/view_user', [AdminController::class, 'view_user']); // Añadir usuarios
route::get('/show_user', [AdminController::class, 'show_user']); // Mostrar usuarios
route::post('/add_user', [AdminController::class, 'add_user']); // Mostrar usuarios
route::get('/delete_user/{id}', [AdminController::class, 'delete_user']); // Eliminar un producto vía ID
route::get('/update_user/{id}', [AdminController::class, 'update_user']); // Actualizar un producto vía ID
route::post('/update_user_confirm/{id}', [AdminController::class, 'update_user_confirm']); // Guardar los cambios editados
route::get('/update_category/{id}', [AdminController::class, 'update_category']); // Actualizar un producto vía ID
route::post('/update_category_confirm/{id}', [AdminController::class, 'update_category_confirm']); // Guardar los cambios editados
route::get('/view_home', [AdminController::class, 'view_home']); // Volver al home


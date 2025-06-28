<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::post('/productos/filtrar', [ProductoController::class, 'filtrar'])->name('productos.filtrar');
Route::get('/productos/crear', [ProductoController::class, 'crear'])->name('productos.crear');
Route::post('/productos', [ProductoController::class, 'guardar'])->name('productos.guardar');
Route::get('/productos/{id}/editar', [ProductoController::class, 'editar'])->name('productos.editar');
Route::put('/productos/{id}', [ProductoController::class, 'actualizar'])->name('productos.actualizar');
Route::delete('/productos/{id}', [ProductoController::class, 'eliminar'])->name('productos.eliminar');



Route::get('/', function () {
    return view('welcome');

});

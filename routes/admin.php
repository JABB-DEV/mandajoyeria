<?php

use Illuminate\Support\Facades\Route;

Route::get('usuarios', function () {
    return view('admin.users.index');
})  
    ->name('admin.usuarios')
    ->middleware('auth');

Route::get('productos/categorias', function () {
    return view('admin.product_category.index');
})
    ->name('admin.productos.categorias')
    ->middleware('auth');

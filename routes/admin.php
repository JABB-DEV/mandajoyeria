<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('usuarios', function(){
    return view('admin.users.index');
})->middleware('auth');

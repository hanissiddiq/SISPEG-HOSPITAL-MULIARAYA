<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomePageController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     // return view('Homepage');
//     return view('dashboard');
// });

// Route HomePage
Route::get('/', [HomePageController::class, 'index']);

//Route Admin Area
// Route::get('/user', [AdminController::class, 'index'])->middleware('auth');
Route::get('/user', [AdminController::class, 'index']);
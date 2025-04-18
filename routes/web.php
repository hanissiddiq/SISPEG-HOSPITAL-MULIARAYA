<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\UserController;

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



// ==========routes asli=========
// Route::get('/users', [UserController::class, 'index'])->name('create_user'); // halaman utama yg pakai modal
// Route::post('/user/create', [UserController::class, 'store'])->name('store_user'); // buat simpan data

// Route::get('/user/list', [UserController::class, 'index'])->name('list_user');


// =======Routes dari Ai======
// Halaman daftar user (dengan modal tambah user)
Route::get('/users', [UserController::class, 'index'])->name('create_user'); // tampilan utama

// Simpan user baru
Route::post('/user/create', [UserController::class, 'store'])->name('store_user');

// Menampilkan data user (misalnya via AJAX / detail untuk edit)
Route::get('/user/detail/{id}', [UserController::class, 'edit'])->name('user_edit');

// Update data user
Route::put('/user/{id}', [UserController::class, 'update'])->name('user_update');

// Hapus user
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user_destroy');

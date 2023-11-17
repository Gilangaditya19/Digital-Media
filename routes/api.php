<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

// Membuat route untuk register dan login
Route::post("/register", [AuthController::class,"register"]);
Route::post("/login", [AuthController::class,"login"]);


Route::get('/news', [NewsController::class, 'index'])->middleware('auth:sanctum'); // maksudnya adalah untuk mengeksekusi permintaan GET ke url metode index dari kelas NewsController, route ini bertanggung jawab untuk menampilkan semua daftar news.
Route::post('/news', [NewsController::class, 'store']); //route ini dimaksudkan untuk membuat artikel news baru
Route::get('/news/{id}', [NewsController::class, 'show']); // route ini bertanggung jawab untuk menampilkan news tunggal
Route::put('/news/{id}', [NewsController::class, 'update']); // route ini bertanggung jawab untuk memperbaharui artikel news yang sudah ada
Route::delete('/news/{id}', [NewsController::class, 'destroy']); // route ini bertanggung jawab untuk menghapus artikel news yang sudah ada 
Route::get('/news/search/{title}', [NewsController::class, 'search']); // route ini bertanggung jawab untuk mencari artikel news berdasarkan kata kunci yang diberikan
Route::get('/news/category/{category}', [NewsController::class, 'category']); //route ini bertanggung jawab untuk mencari artikel news berdasarkan category yang diberikan

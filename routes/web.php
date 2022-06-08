<?php

    use App\Http\Controllers\StorageController;
    use Illuminate\Support\Facades\Route;

Route::get('/', [StorageController::class, 'index'])->name('index');
Route::post('/store', [StorageController::class, 'store'])->name('store');

Route::get('/login', [StorageController::class, 'login'])->name('login');
Route::get('/login2', [StorageController::class, 'login2'])->name('login2');
Route::post('/process_login', [StorageController::class, 'processLogin'])->name('process_login');
Route::get('/show', [StorageController::class, 'show'])->name('show');

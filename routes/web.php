<?php

    use App\Http\Controllers\StorageController;
    use Illuminate\Support\Facades\Route;

Route::get('/', [StorageController::class, 'index']);

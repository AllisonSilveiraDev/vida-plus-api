<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return response()->json(['message' => 'API funcionando! 🚀']);
});

Route::prefix('auth')->group(function () {
    Route::get('/login', [UserController::class, 'login']);
});
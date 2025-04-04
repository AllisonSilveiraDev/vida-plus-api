<?php

use Illuminate\Support\Facades\Route;

Route::get('/ola', function () {
    return response()->json(['message' => 'ola!']);
});

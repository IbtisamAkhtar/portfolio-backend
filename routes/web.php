<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'Laravel Portfolio Backend is working!',
        'status' => 'success'
    ]);
});

Route::get('/test', function () {
    return 'Simple test endpoint working!';
});

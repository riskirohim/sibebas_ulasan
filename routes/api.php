<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ReviewApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
});

// Test route to check if api.php is loaded
Route::get('/test', function () {
    return response()->json(['message' => 'API test route is working!'], 200);
});

// Explicitly define API routes for reviews (CRUD)
Route::get('/reviews', [ReviewApiController::class, 'index']);
Route::post('/reviews', [ReviewApiController::class, 'store']);
Route::get('/reviews/{id}', [ReviewApiController::class, 'show']);
Route::put('/reviews/{id}', [ReviewApiController::class, 'update']);
Route::delete('/reviews/{id}', [ReviewApiController::class, 'destroy']);

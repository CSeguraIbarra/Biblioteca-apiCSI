<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Middleware\JwtMiddleware;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LectorController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(JwtMiddleware::class)->apiResource('libros', LibroController::class);

Route::post('/login', [LoginController::class, 'login']);
Route::middleware(JwtMiddleware::class)->apiResource('lectores', LectorController::class);
    

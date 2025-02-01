<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\BukuKembaliController;
use Illuminate\Database\Query\IndexHint;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Auth routes
Route::post('/auth/login-or-register', [AuthController::class, 'loginOrRegister']); // Login atau Register otomatis
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/auth/user', [AuthController::class, 'showUserData']); // Lihat data user yang sedang login
    Route::post('/auth/logout', function (Request $request) {
        $request->user()->tokens()->delete(); // Hapus token untuk logout
        return response()->json(['message' => 'Logged out successfully']);
    });
});

Route::get('/Buku', [BukuController::class, 'index']);
Route::post('/Buku', [BukuController::class, 'store']);
Route::put('/Buku/{id}',[BukuController::class, 'update']);
Route::delete('/Buku/{id}', [BukuController::class, 'destroy']);
Route::put('Buku/{id}/return', [BukuController::class, 'return']);

Route::get('/BukuKembali', [BukuKembaliController::class, 'index']);
Route::post('/BukuKembali', [BukuKembaliController::class, 'store']);
Route::put('/BukuKembali/{id}',[BukuKembaliController::class, 'update']);
Route::delete('/BukuKembali/{id}', [BukuKembaliController::class, 'destroy']);
Route::put('BukuKembali/{id}/return', [BukuKembaliController::class, 'return']);

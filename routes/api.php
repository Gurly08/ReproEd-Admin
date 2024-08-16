<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UjianController;
use App\Http\Controllers\Api\ContentMateriController;
use App\Http\Controllers\Api\ContentEdukasiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//register
Route::post('/register', [AuthController::class, 'register']);

//login
Route::post('/login', [AuthController::class, 'login']);

//logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

//create ujian
Route::post('/create-ujian', [UjianController::class, 'createUjian'])->middleware('auth:sanctum');

//get soal ujian
Route::get('/get-soal-ujian', [UjianController::class, 'getListSoalByKategori'])->middleware('auth:sanctum');

//answer ujian
Route::post('/answers', [UjianController::class, 'jawabSoal'])->middleware('auth:sanctum');

//get hasil ujian
Route::get('/get-nilai', [UjianController::class, 'hitungNilaiUjianBykategori'])->middleware('auth:sanctum');

//get materi
Route::get('/get-content-materi', [ContentMateriController::class, 'getMateri']);

//get edukasi
Route::get('/get-content-edukasi', [ContentEdukasiController::class, 'createEdukasi'])->middleware('auth:sanctum');

<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
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
Route::controller(LoginRegisterController::class)->group(function () {
    Route::post('/login', 'login');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [LoginRegisterController::class, 'logout']);


    Route::apiResource('mahasiswa', MahasiswaController::class);
    Route::apiResource('dosen', DosenController::class);
    Route::apiResource('matakuliah', MatakuliahController::class);
    route::put('mahasiswa/uploadImage/{nim_2010041}', [MahasiswaController::class, 'uploadImage']);
    route::put('dosen/uploadImage/{nidn2010041}', [DosenController::class, 'uploadImage']);
    route::put('matakuliah/uploadImage/{kdmatkul2010041}', [MatakuliahController::class, 'uploadImage']);

});





<?php

use App\Http\Controllers\ProductApiController;
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

Route::get('/employee-list', [ProductApiController::class, 'index'])->name('employee-list.index');
Route::post('/employee-store', [ProductApiController::class, 'store'])->name('employee-store.index');
Route::get('/employee-edit/{id}', [ProductApiController::class, 'edit'])->name('employee-edit.index');

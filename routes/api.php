<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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

Route::get('/task', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/task', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/task{id}', [TaskController::class, 'show'])->name('tasks.show');
Route::put('/task{id}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/task{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

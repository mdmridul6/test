<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\MarksController::class, 'index'])->name('home');
Route::get('/create', [\App\Http\Controllers\MarksController::class, 'create'])->name('create');
Route::post('/create', [\App\Http\Controllers\MarksController::class, 'store'])->name('create');
Route::get('/edit/{marks}', [\App\Http\Controllers\MarksController::class, 'edit'])->name('edit');
Route::put('/edit/{marks}', [\App\Http\Controllers\MarksController::class, 'update'])->name('edit');
Route::delete('/delete/{marks}', [\App\Http\Controllers\MarksController::class, 'destroy'])->name('delete');

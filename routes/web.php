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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create', [\App\Http\Controllers\HomeController::class, 'create'])->middleware(['auth'])->name('create');
Route::post('/create', [\App\Http\Controllers\HomeController::class, 'store'])->middleware(['auth']);
Route::get('/p/{post}', [\App\Http\Controllers\HomeController::class, 'show']);
Route::get('/p/{post}/edit', [\App\Http\Controllers\HomeController::class, 'edit'])->middleware(['auth']);
Route::patch('/p/{post}', [\App\Http\Controllers\HomeController::class, 'update'])->middleware(['auth']);
Route::delete('/p/{post}', [\App\Http\Controllers\HomeController::class, 'destroy'])->middleware(['auth']);

Route::post('/p/{post}', [\App\Http\Controllers\CommentController::class, 'store'])->middleware(['auth']);
Route::get('/c/{comment}/edit', [\App\Http\Controllers\CommentController::class, 'edit'])->middleware(['auth']);
Route::patch('/c/{comment}', [\App\Http\Controllers\CommentController::class, 'update'])->middleware(['auth']);
Route::delete('/c/{comment}', [\App\Http\Controllers\CommentController::class, 'destroy'])->middleware(['auth']);

Route::get('r/{subsection}', [\App\Http\Controllers\SubsectionController::class, 'show']);
require __DIR__.'/auth.php';

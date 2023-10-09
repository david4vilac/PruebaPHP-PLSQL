<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeguimientosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SeguimientosController::class, 'index'])->name('seguimientos.index');
Route::get('/create', [SeguimientosController::class, 'create'])->name('seguimientos.create');
Route::get('/edit/{id}', [SeguimientosController::class, 'edit'])->name('seguimientos.edit');
Route::put('/update/{id}', [SeguimientosController::class, 'update'])->name('seguimientos.update');
Route::post('/store', [SeguimientosController::class, 'store'])->name('seguimientos.store');
Route::get('/show/{id}', [SeguimientosController::class, 'show'])->name('seguimientos.show');
Route::delete('/destroy/{id}', [SeguimientosController::class, 'destroy'])->name('seguimientos.destroy');
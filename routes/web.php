<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeguimientosController;


Route::get('/', function () { $paginaActual = 'home';
     return view('home', compact('paginaActual')); })->name('home.index');
Route::get('/seguimiento', [SeguimientosController::class, 'index'])->name('seguimientos.index');
Route::get('/create', [SeguimientosController::class, 'create'])->name('seguimientos.create');
Route::get('/edit/{id}', [SeguimientosController::class, 'edit'])->name('seguimientos.edit');
Route::put('/update/{id}', [SeguimientosController::class, 'update'])->name('seguimientos.update');
Route::post('/store', [SeguimientosController::class, 'store'])->name('seguimientos.store');
Route::get('/show/{id}', [SeguimientosController::class, 'show'])->name('seguimientos.show');
Route::delete('/destroy/{id}', [SeguimientosController::class, 'destroy'])->name('seguimientos.destroy');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\PrestamoController;

Route::get('/', [LibroController::class, 'index'])->name('Libro.index');
Route::get('/agregar/', [LibroController::class, 'create'])->name('Libro.create');
Route::post('/agregar/', [LibroController::class,'store'])->name('Libro.store');
Route::get('/actualizar/{id}', [LibroController::class,'edit'])->name('Libro.edit');
Route::put('/actualizar/{id}', [LibroController::class,'update'])->name('Libro.update');
Route::get('/detalles/{id}', [LibroController::class,'show'])->name('Libro.show');
Route::delete('/eliminar/{id}', [LibroController::class, 'destroy'])->name('Libro.destroy');

Route::post('/crear/', [AutorController::class,'store'])->name('Autor.store');

Route::get('/prestamos/', [PrestamoController::class,'index'])->name('Prestamo.index');
Route::get('/prestados/', [PrestamoController::class,'show'])->name('Prestamo.show');
Route::get('/registrarprestamo/{id}', [PrestamoController::class,'create'])->name('Prestamo.create');
Route::post('/registrarprestamo/', [PrestamoController::class,'store'])->name('Prestamo.store');
Route::put('/recibir/{id}', [PrestamoController::class,'update'])->name('Prestamo.update');

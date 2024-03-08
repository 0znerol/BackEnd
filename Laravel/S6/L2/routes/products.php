<?php

use App\Http\Controllers\ProdottoController;
use Illuminate\Support\Facades\Route;



Route::get('/prodotti', [ProdottoController::class, 'index'])->name('prodotti.index');


Route::get('/prodotti/create', [ProdottoController::class, 'create'])->name('prodotti.create');
Route::post('/prodotti', [ProdottoController::class, 'store'])->name('prodotti.store');


Route::get('/prodotti/{prodotto}', [ProdottoController::class, 'show'])->name('prodotti.show');


Route::get('/prodotti/{prodotto}/edit', [ProdottoController::class, 'edit'])->name('prodotti.edit');
Route::put('/prodotti/{prodotto}', [ProdottoController::class, 'update'])->name('prodotti.update');

Route::delete('/prodotti/{prodotto}', [ProdottoController::class, 'destroy'])->name('prodotti.destroy');

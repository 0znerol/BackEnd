<?php

use App\Http\Controllers\AttivitaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgettoController;
use App\Models\Attivita;
use App\Models\Progetto;
use Illuminate\Support\Facades\Route;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'progetto' => Progetto::all(),
        'attivita' => Attivita::all(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::put('/progetto/{progetto}', [ProgettoController::class, 'update'])->name('progetto.update');
    // Route::get('/progetto/{progetto}', [ProgettoController::class, 'show'])->name('progetto.show');
    // Route::delete('/progetto/{progetto}', [ProgettoController::class, 'destroy'])->name('progetto.destroy');
    // Route::get('/progetto/{progetto}/edit', [ProgettoController::class, 'edit'])->name('progetto.edit');
    // Route::get('/progetto/create', [ProgettoController::class, 'create'])->name('progetto.create');
});

Route::resource('progetto', ProgettoController::class)->except(['update', 'store']);

require __DIR__ . '/auth.php';

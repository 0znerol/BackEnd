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
 * | routes are loaded by the RouteServiceProvider and all of them will
 * | be assigned to the "web" middleware group. Make something great!
 * |
 */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect('/progetto' /* , [
         'progetto' => Progetto::all(),
         'attivita' => Attivita::all(),
     ] */);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('progetto', ProgettoController::class)->middleware('auth', 'verified');
Route::resource('attivita', AttivitaController::class)->middleware('auth', 'verified');
Route::get('/progetto/{id}/destroy', [ProgettoController::class, 'progdestroy']);

require __DIR__ . '/auth.php';
// Route::resource('/posts', PostController::class);
// Route::post('/posts/update', [PostController::class, 'postupdate']);

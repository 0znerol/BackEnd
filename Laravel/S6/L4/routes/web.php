<?php

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
    return view('userLog');
})->name('usrLog');
Route::get('/loggedUser', function () {
    return view('loggedUser');
})->name('loggedUser');

Route::get('/usrReg', function () {
    return view('userReg');
})->name('usrReg');
require __DIR__ . '/auth.php';

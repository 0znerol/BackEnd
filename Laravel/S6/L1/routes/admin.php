<?php

use Illuminate\Support\Facades\Route;
    // Creo un gruppo di rotte separate da quelle in web
    Route::get('/add_task', function () {
        return view('newTask');
    })->name('newTask');

    Route::get('/detail/{id}/{status}', function ($id, $status) {
        return view('singleTask', ['id' => $id, 'status' => $status]);
    })->name('singleTask');

    Route::get('/update/{id}', function ($id) {
        return view('modTask', ['id' => $id]);
    })->name('modTask');

    Route::get('/delete/{id}', function ($id) {
        return view('delTask', ['id' => $id]);
    })->name('delTask');
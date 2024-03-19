<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCorsoRequest;
use App\Http\Requests\UpdateCorsoRequest;
use App\Models\Corso;

class CorsoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard', ['corsi' => Corso::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCorsoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Corso $corso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Corso $corso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCorsoRequest $request, Corso $corso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Corso $corso)
    {
        //
    }
}

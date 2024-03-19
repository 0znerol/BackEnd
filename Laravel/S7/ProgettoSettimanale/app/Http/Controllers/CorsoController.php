<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCorsoRequest;
use App\Http\Requests\UpdateCorsoRequest;
use App\Models\Corso;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CorsoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard', ['corsi' => Corso::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('corsoCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCorsoRequest $request)
    {
        $data = $request->only([
            'title',
            'description',
            'thumb'
        ]);
        $data['created_at'] = Carbon::now();
        $queryBuilder = DB::table('corsos')->insert($data);

        return redirect()->action([CorsoController::class, 'index']);
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
        return view('corsoEdit', ['corso' => $corso]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCorsoRequest $request, $id)
    {
        $corso = Corso::findOrFail($id);
        $request = $request->only(['title', 'description', 'thumb']);
        $request['updated_at'] = Carbon::now();
        $corso->update($request);

        return redirect()->action([CorsoController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Corso $corso)
    {
        $queryBuilder = $corso->delete();
        return $queryBuilder ? redirect()->action([CorsoController::class, 'index']) : 'Post not found!!!';
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProgettoRequest;
use App\Http\Requests\UpdateProgettoRequest;
use App\Models\Progetto;
use Illuminate\Support\Facades\Auth;

class ProgettoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgettoRequest $request)
    {
        $progetto = new Progetto($request->only(['title', 'description', 'thumb']));
        $progetto->user_id = Auth::id();
        $progetto->save();

        return 'created';

        // $validated = $request->validated();
        // $progetto = new Progetto($validated);
        // $progetto->user_id = Auth::id();
        // $progetto->save();

        // return response()->json([
        //     'message' => 'Progetto created successfully',
        //     'progetto' => $progetto
        // ]);
    }

    public function storeAjax(StoreProgettoRequest $request)
    {
        return response()->json([
            'message' => 'Progetto created successfully',
            'progetto' => $progetto
        ]);
        $validated = $request->validated();
        $progetto = new Progetto($validated);
        $progetto->user_id = Auth::id();
        $progetto->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Progetto $progetto)
    {
        return view('projDetail', ['progetto' => $progetto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Progetto $progetto)
    {
        return view('projEdit', ['progetto' => $progetto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgettoRequest $request, $id)
    {
        $progetto = Progetto::findOrFail($id);

        // Check if the authenticated user can update this progetto
        $this->authorize('update', $progetto);

        // Update the progetto
        $request = $request->only(['title', 'description', 'thumb']);
        $progetto->update($request);

        return 'updated';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Progetto $progetto)
    {
        //
    }
}

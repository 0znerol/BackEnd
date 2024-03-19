<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrenotazioneRequest;
use App\Http\Requests\UpdatePrenotazioneRequest;
use App\Models\Prenotazione;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrenotazioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prenotazioni = Prenotazione::where('user_id', Auth::id())->latest()->get();
        $corsi = DB::table('corsos')->whereIn('id', $prenotazioni->pluck('corso_id'))->get();
        return view('prenotazioni', compact('prenotazioni', 'corsi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrenotazioneRequest $request)
    {
        $data = $request->only([
            'corso_id',
            'orario',
        ]);
        $data['user_id'] = Auth::id();
        $data['stato'] = 'in attesa';
        $data['created_at'] = Carbon::now();

        $queryBuilder = DB::table('prenotaziones')->insert($data);

        return redirect()->action([PrenotazioneController::class, 'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Prenotazione $prenotazione)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prenotazione $prenotazione)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrenotazioneRequest $request, Prenotazione $prenotazione)
    {
        $data = $request->only([
            'stato',
        ]);
        $data['updated_at'] = Carbon::now();

        $queryBuilder = DB::table('prenotaziones')->where('id', $prenotazione->id)->update($data);

        return redirect()->action([PrenotazioneController::class, 'gestione']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prenotazione $prenotazione)
    {
        $queryBuilder = $prenotazione->delete();
        return $queryBuilder ? redirect()->action([PrenotazioneController::class, 'index']) : 'Post not found!!!';
    }

    public function gestione()
    {
        // return view('gestione');
        $prenotazioni = Prenotazione::all();
        $corsi = DB::table('corsos')->whereIn('id', $prenotazioni->pluck('corso_id'))->get();
        $users = DB::table('users')->whereIn('id', $prenotazioni->pluck('user_id'))->get();
        return view('gestione', compact('prenotazioni', 'corsi', 'users'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProgettoController;
use App\Http\Requests\StoreAttivitaRequest;
use App\Http\Requests\UpdateAttivitaRequest;
use App\Models\Attivita;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttivitaController extends Controller
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
        return view('attCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttivitaRequest $request)
    {
        $data = $request->only([
            'title',
            'description',
            'progetto_id'
        ]);
        $data['thumb'] = 'https://via.placeholder.com/150';
        $data['created_at'] = Carbon::now();
        $queryBuilder = DB::table('attivitas')->insert($data);

        return redirect()->route('attivita.show', $data['progetto_id']);
    }

    /**
     * Display the specified resource.
     */
    public function show($progetto_id)
    {
        $attivita = Attivita::where('progetto_id', $progetto_id)->paginate(50);
        return view('attDetail', compact('attivita', 'progetto_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attivita $attivita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttivitaRequest $request, Attivita $attivita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attivita $attivita)
    {
        $queryBuilder = $attivita->delete();
        return $queryBuilder ? 'attivita eliminata' : 'attivita not found!!!';
    }

    public function attdestroy(int $id)
    {
        /* $sql = 'DELETE FROM posts WHERE id = :id';
        $res = DB::delete($sql, ['id' => $id]); */

        $queryBuilder = DB::table('attivitas')->delete($id);

        // return $queryBuilder ? 'Post Deleted' : 'Post not found!!!';
        return redirect()->back();
    }

    public function attcreate($progetto_id)
    {
        return view('attCreate', compact('progetto_id'));
    }
}

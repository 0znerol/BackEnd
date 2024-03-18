<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProgettoRequest;
use App\Http\Requests\UpdateProgettoRequest;
use App\Models\Progetto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Carbon;

class ProgettoController extends Controller
{
    public function index()
    {
        return view('dashboard', ['progetto' => Progetto::with('attivita')->where('user_id', Auth::id())->paginate(50)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Progetto $progetto)
    {
        return view('projCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgettoRequest $request)
    {
        $data = $request->only([
            'title',
            'description',
            'thumb'
        ]);
        $data['user_id'] = Auth::id();
        $data['created_at'] = Carbon::now();
        $queryBuilder = DB::table('progettos')->insert($data);

        return redirect()->action([ProgettoController::class, 'index']);
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
        $request = $request->only(['title', 'description', 'thumb']);
        $progetto->update($request);

        return redirect()->action([ProgettoController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Progetto $progetto)
    {
        $queryBuilder = $progetto->delete();
        return $queryBuilder ? 'Post Updated' : 'Post not found!!!';
    }

    public function progdestroy(int $id)
    {
        /* $sql = 'DELETE FROM posts WHERE id = :id';
        $res = DB::delete($sql, ['id' => $id]); */

        $queryBuilder = DB::table('progettos')->delete($id);

        // return $queryBuilder ? 'Post Deleted' : 'Post not found!!!';
        return redirect()->back();
    }
}

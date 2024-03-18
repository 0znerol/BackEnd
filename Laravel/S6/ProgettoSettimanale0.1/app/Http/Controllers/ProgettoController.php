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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Progetto::with('attivita')->paginate(10);
        // return Auth::user()->progetto
        // return Progetto::with('attivita')->where('user_id', Auth::id())->paginate(10);
        return view('dashboard', ['progetto' => Progetto::with('attivita')->where('user_id', Auth::id())->paginate(10)]);
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

        // Soluzione 1
        /* $sql = 'INSERT INTO posts (title, description, post_thumb, user_id, created_at)
                VALUES (:title, :description, :post_thumb, :user_id, :created_at)';
        $res = DB::update($sql, $data);
        //return $res ? 'Post Created' : 'Post not found!!!';
        return redirect()->action([PostController::class, 'index']); */

        // Soluzione 2
        $queryBuilder = DB::table('progettos')->insert($data);

        // Soluzione 3
        // $queryBuilder = Progetto::create($data);

        // return $queryBuilder ? 'Post Created' : 'Post not found!!!';
        return redirect()->action([ProgettoController::class, 'index']);
        // return 'created';

        // // Update the post...

        // $progetto = new Progetto($request->only(['title', 'description', 'thumb']));
        // $progetto->user_id = Auth::id();
        // $progetto->save();
        // return redirect('/posts');

        // $validated = $request->validated();
        // $progetto = new Progetto($validated);
        // $progetto->user_id = Auth::id();
        // $progetto->save();

        // return response()->json([
        //     'message' => 'Progetto created successfully',
        //     'progetto' => $progetto
        // ]);

        // $authorBuilder = Author::orderBy('id');
        // $data = $request->only(['title', 'description', 'thumb', 'user_id']);
        // $data['author_name'] = $authorBuilder->where('id', '=', $data['author_id'])->first()->name;
        // print_r($data);

        // // Soluzione 1
        // /* $sql = 'INSERT INTO posts (title, description, post_thumb, user_id, created_at)
        //         VALUES (:title, :description, :post_thumb, :user_id, :created_at)';
        // $res = DB::update($sql, $data);
        // //return $res ? 'Post Created' : 'Post not found!!!';
        // return redirect()->action([PostController::class, 'index']); */

        // // Soluzione 2
        // // $queryBuilder = DB::table('posts')->insert($data);
        // // Soluzione 3
        // $queryBuilder = Book::create($data);

        // // return $queryBuilder ? 'Post Created' : 'Post not found!!!';
        // return redirect()->route('home');
    }

    public function storeAjax(StoreProgettoRequest $request)
    {
        dd($request->all());
        // return response()->json([
        //     'message' => 'Progetto created successfully',
        //     'progetto' => $progetto
        // ]);
        // $validated = $request->validated();
        // $progetto = new Progetto($validated);
        // $progetto->user_id = Auth::id();
        // $progetto->save();
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
        dd($request->all());
        // $progetto = Progetto::findOrFail($id);

        // // Authorize the update action for the authenticated user
        // $this->authorize('update', $progetto);

        // // Update the progetto
        // $request = $request->only(['title', 'description', 'thumb']);
        // $progetto->update($request);

        // return 'updated';
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

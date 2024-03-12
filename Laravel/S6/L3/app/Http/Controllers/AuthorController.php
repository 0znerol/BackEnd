<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $queryBuilder = Author::orderBy('id');
        if($request->has('id')){
            $queryBuilder->where('id', '=', $request->get('id'));
        }

        //return $queryBuilder->get();
        return view('allAuthors', ['authors' => $queryBuilder->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addAuthor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->only(['name']);
        print_r($data);
        // Soluzione 1
        /* $sql = 'INSERT INTO posts (title, description, post_thumb, user_id, created_at)
                VALUES (:title, :description, :post_thumb, :user_id, :created_at)';
        $res = DB::update($sql, $data);
        //return $res ? 'Post Created' : 'Post not found!!!';
        return redirect()->action([PostController::class, 'index']); */

        // Soluzione 2
        //$queryBuilder = DB::table('posts')->insert($data);
        // Soluzione 3
        $queryBuilder = Author::create($data);

        //return $queryBuilder ? 'Post Created' : 'Post not found!!!';
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Database\Seeders\BooksSeeder;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $queryBuilder = Book::orderBy('id');
        if($request->has('id')){
            $queryBuilder->where('id', '=', $request->get('id'));
        }

        //return $queryBuilder->get();
        return view('booksList', ['books' => $queryBuilder->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $queryBuilder = Author::orderBy('id');
        if($request->has('id')){
            $queryBuilder->where('id', '=', $request->get('id'));
        }
        return view('addBook', ['authors' => $queryBuilder->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $authorBuilder = Author::orderBy('id');
        $data = $request->only(["title", "author_id", "relesed", "category"]);
        $data['author_name'] = $authorBuilder->where('id', '=', $data['author_id'])->first()->name;
        print_r($data);
        
        // Soluzione 1
        /* $sql = 'INSERT INTO posts (title, description, post_thumb, user_id, created_at)
                VALUES (:title, :description, :post_thumb, :user_id, :created_at)';
        $res = DB::update($sql, $data);
        //return $res ? 'Post Created' : 'Post not found!!!';
        return redirect()->action([PostController::class, 'index']); */

        // Soluzione 2
        // $queryBuilder = DB::table('posts')->insert($data);
        // Soluzione 3
        $queryBuilder = Book::create($data);

        //return $queryBuilder ? 'Post Created' : 'Post not found!!!';
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('bookDetail', [
            'books' => Book::findOrFail($id)
        ]);
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


    // public function store(Request $request, BooksSeeder $booksSeeder)
    // {
    //     $validatedData = $request->validate([
    //         'title' => 'required|max:255',
    //         'author' => 'required',
    //         'relesed' => 'required|numeric',
    //         'category' => 'required',
    //     ]);

    //     $booksSeeder->run($validatedData);

    //     // Redirect or return a response as needed
    //     return redirect()->route('home')->with('success', 'Book created successfully!');
    // }


}

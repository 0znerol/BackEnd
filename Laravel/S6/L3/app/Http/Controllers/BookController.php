<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Database\Seeders\BooksSeeder;

class BookController extends Controller
{
    public function store(Request $request, BooksSeeder $booksSeeder)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required',
            'relesed' => 'required|numeric',
            'category' => 'required',
        ]);

        $booksSeeder->run($validatedData);

        // Redirect or return a response as needed
        return redirect()->route('home')->with('success', 'Book created successfully!');
    }
}

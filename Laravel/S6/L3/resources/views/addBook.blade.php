@extends('layout.app')

@section('content')
<?php


?>
    <h1>Aggiungi</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="author_id">Autore</label>
            <select name="author_id" id="author_id" class="form-control" required>

                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="relesed">Data Pubblicazione</label>
            <input type="date" name="relesed" id="relesed" class="form-control" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="category">Categoria</label>
            <input type="text" name="category" id="category" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Crea Prodotto</button>
    </form>
@endsection
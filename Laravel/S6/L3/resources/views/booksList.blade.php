<?php

    $bookRes = json_encode($books);

?>

@extends('layout.app')

@section('content')
    <h1>Elenco Libri</h1>
    <a href="{{ route('books.add') }}" class="btn" >Aggiungi Libro</a>

    <table class="table">
        <thead>
        <tr>
                <th>Titolo</th>
                <th>Autore</th>
                <th>Data Pubblicazione</th>
                <th>Categoria</th>
            </tr>
        </thead>
        <tbody>
            @if($bookRes)

                @forelse ($books as $book)
                    <tr>

                    <td><a href=>{{ $book['title'] }}</a></td>
                    <td>{{ $book['author'] }}</td>
                    <td>{{ substr($book['relesed'], 0, 10) }}</td>
                    <td>{{  $book['category']}} </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Nessun libro trovato.</td>
                    </tr>
                @endforelse
            @endif
        </tbody>
    </table>
@endsection
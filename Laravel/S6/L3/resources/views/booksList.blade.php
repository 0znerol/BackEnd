<?php

    $bookRes = json_encode($books);

?>

@extends('layout.app')

@section('content')
    <h1>Elenco Libri</h1>


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

                    <td>{{ $book['title'] }}</td>
                    <td>{{ $book['author'] }}</td>
                    <td>{{ substr($book['created_at'], 0, 10) }}</td>
                    <td>{{  $book['category']}} </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Nessun book trovato.</td>
                    </tr>
                @endforelse
            @endif
        </tbody>
    </table>
@endsection
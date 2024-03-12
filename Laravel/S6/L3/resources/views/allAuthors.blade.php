<?php
//for testing
?>
@extends('layout.app')

@section('content')
<h1>Elenco Libri</h1>
<a href="{{ route('books.add') }}" class="btn" >Aggiungi Libro</a>
<a href="{{ route('authors.create') }}" class="btn" >Aggiungi Autore</a>

<table class="table">
    <thead>
    <tr>
            <th>Autore</th>
        </tr>
    </thead>
    <tbody>
        @if($authors)

            @forelse ($authors as $author)
                <tr>
                <td>{{ $author['name'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nessun autore trovato.</td>
                </tr>
            @endforelse
        @endif
    </tbody>
</table>
@endsection
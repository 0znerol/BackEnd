@extends('layout.app')

@section('content')
    <h1>Dettagli Prodotto</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $prodotto['name'] }}</h5>
            <p class="card-text">{{ $prodotto['description'] }}</p>
            <p class="card-text">Prezzo: {{ $prodotto['price'] }}</p>
        </div>
    </div>

    <a href="{{ route('prodotti.index') }}" class="btn btn-primary mt-3">Torna all'elenco</a>
@endsection
@extends('layout.app')

@section('content')
    <h1>Crea Nuovo Prodotto</h1>

    <form action="{{ route('prodotti.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Crea Prodotto</button>
    </form>
@endsection

@extends('layout.app')

@section('content')
    <h1>Elenco Prodotti</h1>

    <a href="{{ route('prodotti.create') }}" class="btn btn-primary mb-3">Nuovo Prodotto</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrizione</th>
                <th>Prezzo</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @if($prodotti)
                @php
                    print_r($prodotti)
                @endphp
                @forelse ($prodotti as $prodotto)
                    <tr>

                        <td>{{ $prodotto['name'] }}</td>
                        <td>{{ $prodotto['description'] }}</td>
                        <td>{{ $prodotto['price'] }}</td>
                        <td>
                            <a href="{{ route('prodotti.show', ['prodotto' => $prodotto['id']]) }}" class="btn btn-sm btn-primary">Mostra</a>
                            <a href="{{ route('prodotti.edit', ['prodotto' => $prodotto['id']]) }}" class="btn btn-sm btn-secondary">Modifica</a>
                            <form action="{{ route('prodotti.destroy', ['prodotto' => $prodotto['id']]) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo prodotto?')">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Nessun prodotto trovato.</td>
                    </tr>
                @endforelse
            @endif
        </tbody>
    </table>
@endsection
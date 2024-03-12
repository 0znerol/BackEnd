@extends('layout.app')

@section('content')
    <h1>Aggiungi</h1>
    <form action="/authors" method="POST">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Nome</label>
            <textarea name="name" id="name" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">aggiungi Autore</button>
    </form>
@endsection
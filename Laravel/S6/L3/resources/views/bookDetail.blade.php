
@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Book Detail</h1>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $books->title }}</h5>
            <p class="card-text">{{ $books->author_name }}</p>
            <p class="card-text">{{ $books->category }}</p>
            <p class="card-text">{{ $books->relesed }}</p>
            <a href="{{ route('books.index') }}" class="btn btn-primary">Go Back</a>
        </div>
    </div>



@endsection
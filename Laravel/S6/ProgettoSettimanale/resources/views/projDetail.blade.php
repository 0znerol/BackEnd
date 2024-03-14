<x-app-layout>
    <div>
        @if($progetto)

            <h1 class="text-2xl font-bold">{{ $progetto->title }}</h1>
            <p>{{ $progetto->description }}</p>
            <img src="{{ $progetto->thumb }}" alt="{{ $progetto->title }}" class="w-64 h-64 object-cover">

        @else
            <p>Progetto non trovato</p>
        @endif
    </div>
    <a href="{{ route('dashboard') }}" class="btn border">Back</a>
</x-app-layout>

<x-app-layout>
    <div class="flex justify-center flex-row">
        @if($progetto)
            <div class="flex flex-col justify-center text-white border rounded">

                <h1 class="text-2xl font-bold m-auto">{{ $progetto->title }}</h1>
                <p class="mb-5">{{ $progetto->description }}</p>
                <img src="{{ $progetto->thumb }}" alt="{{ $progetto->title }}" class="w-64 h-64 object-cover  m-auto border">
                <div class="flex justify-around flex-row">
                
                    <a href="{{ route('dashboard') }}" class="btn border rounded">Back</a>
                    <a href="/attivita?pid={{$progetto->id}}" class="btn border rounded">attivita</a>
                </div>

            </div>
        @else
            <p>Progetto non trovato</p>
        @endif

    </div>
</x-app-layout>

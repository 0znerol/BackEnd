<x-app-layout>
    <div class="flex justify-center flex-row">
        @if($progetto)
            <div class=" text-center flex flex-col justify-center text-white border-dark m-5 p-2 rounded bg-dark w-50">
                <img src="{{ $progetto->thumb }}" alt="{{ $progetto->title }}" class="w-64 h-64 object-cover  m-auto border">

                <h1 class="text-2xl font-bold m-auto">{{ $progetto->title }}</h1>
                <p class="mb-5">{{ $progetto->description }}</p>
                <div class="text-start m-2">
                    @if ($progetto->attivita->isNotEmpty())
                        <h1 class="text-1xl font-bold m-auto">Attivita:</h1>
                        <ul class="list-group p-2 border">
                            @foreach ($progetto->attivita as $att)
                                @if ($att->progetto_id == $progetto->id)
                                    <li class="border-b-2 border-inherit my-3">{{ $att->title }}</li>
                                @endif
                            @endforeach
                        </ul>
                    @else
                        <p class="text-danger">nessuna attivita trovata</p>
                        <p class="text-danger">clicca su mod attivita per aggiungerne</p>
                    @endif
                </div>
                <div class="flex justify-around flex-row">
                    <a href="{{ route('dashboard') }}" class="btn border-danger rounded text-danger">Back</a>
                    <a href="{{ route('attivita.show', $progetto->id) }}" class="btn border-warning rounded text-warning">mod attivita</a>
                </div>

            </div>
        @else
            <p>Progetto non trovato</p>
        @endif

    </div>
</x-app-layout>

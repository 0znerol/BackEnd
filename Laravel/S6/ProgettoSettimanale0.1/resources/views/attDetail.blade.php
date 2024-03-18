<x-app-layout>
<div class="p-2">
    <div class="d-flex justify-content-between">
        <a type="button" class="btn border-success rounder text-success m-2" href="{{ route('attCreate', $progetto_id) }}" >Crea Attivita</a>
        <a href="{{ route('progetto.show', $progetto_id) }}" class="btn border-warning text-warning h-50">Back</a>
    </div>
    <div class="flex justify-center flex-row">

        <div class="flex flex-col justify-center text-white  rounded">
            @if($attivita)
                <h1 class="text-2xl font-bold m-auto mb-5">Attivita</h1>
                <ul class="list-disc">
                    @foreach ($attivita as $att)
                        <li class="d-flex justify-content-between mt-5">
                        <div class="p-2">
                        <h2 class="text-1xl font-bold m-auto mb-1">{{$att->title}}</h2>
                        <p>{{$att->description}}</p>
                        </div>
                        </li>
                        <a type="button" class="btn border-danger rounded text-danger ms-2" href="/attivita/{{$att->id}}/destroy">Delete</a>

                    @endforeach
                </ul>
            @else
                <p>Progetto non trovato</p>
            @endif
        </div>
    </div>
</div>
</x-app-layout>

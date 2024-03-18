<x-app-layout>
    <div class="flex justify-center flex-row">
        <div class="flex flex-col justify-center text-white  rounded">
            @if($attivita)
                <h1 class="text-2xl font-bold m-auto mb-5">Attivita</h1>
                <ul class="list-disc">
                    @foreach ($attivita as $att)
                        <li>{{$att->title}}</li>
                    @endforeach
                </ul>
            @else
                <p>Progetto non trovato</p>
            @endif
        </div>
    </div>
</x-app-layout>

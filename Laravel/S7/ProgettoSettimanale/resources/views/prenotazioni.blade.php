<x-app-layout>

    @if($prenotazioni)
        <div class="container">
            <div class="row">
                @foreach($prenotazioni as $prenotazione)
                    <div class="col-4 mt-2" style="max-height: 480px;">
                        <div class="card m-auto" style="width: 18rem; height: 100%;">
                            <div class="card-body d-flex flex-column p-0 px-1  " style="height: 50%;">
                                <h5 class="card-title
                                text-xl font-semibold">{{ $prenotazione->stato }}</h5>

                                @foreach($corsi as $corso)
                                    @if($corso->id == $prenotazione->corso_id)
                                        <img src="{{ $corso->thumb }}" class="card-img-top" alt="{{ $corso->title }}">
                                        <p class="card-text">{{ $corso->description }}</p>
                                        <p class="card-text">orari: </p>
                                        <p>{{ $corso->orari }}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>No courses found</h1>
                </div>
            </div>
        </div>
    @endif


</x-app-layout>
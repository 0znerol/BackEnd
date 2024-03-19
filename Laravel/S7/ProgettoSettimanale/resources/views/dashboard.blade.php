<x-app-layout>
    <x-slot name="header">
        <div class="d-flex">
            <h2 class="font-semibold text-xl text-center mt-2 text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>

    </x-slot>

    @if(Auth::user()->name == 'admin')

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div>{{ Auth::user()->name }} panel</div>
                        <a href="{{ route('gestione') }}" class="btn border mt-3 text-blue-500">Gestisci Prenotazioni</a>
                        <a href="{{ route('corso.create') }}" class="btn border mt-3 text-blue-500">Aggiungi Corso</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div>
        @if($corsi->count() > 0)

            <div class="container mt-4">
            <h5 class="card-title text-xl font-semibold">Corsi</h5>

                <div class="row">
                    @foreach($corsi as $corso)
                        <div class="col-md-6 col-lg-4  my-3" style="max-height: 600px;">
                            <div class="card m-auto " style="width: 18rem; height: 100%;">
                                <img src="{{ $corso->thumb }}" class="card-img-top m-auto border rounded" alt="{{ $corso->title }}">
                                <div class="card-body d-flex flex-column p-0 px-1  " style="height: 50%;">
                                    <h5 class="card-title text-xl font-semibold">{{ $corso->title }}</h5>
                                    <p class="card-text">{{ Str::limit($corso->description, 100, ' ···[Read More]') }}</p>
                                </div>
                                <a href="{{ route('corso.show', $corso->id) }}" class="btn border mt-2 text-primary">Dettaglio</a>
                                @if(Auth::user()->name == 'admin')
                                <div class="d-flex justify-content-around">

                                    <form action="{{ route('corso.destroy', $corso) }}" method="post" class="d-flex mb-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger m-auto text-danger">Delete</button>
                                    </form>

                                    <form action="{{ route('corso.edit', $corso->id) }}" method="get" class="d-flex mb-2">
                                        @csrf
                                        <button type="submit" class="btn btn-primary m-auto text-primary">Edit</button>
                                    </form>
                                </div>
                                @else    
                                <div class="m-2 p-1 border rounded">

                                <p class="card-text font-semibold text-xl">Prenota Corso </p>

                                <form action="{{ route('prenotazione.store') }}" method="post" class="d-flex mb-2 p-2">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="corso_id" value="{{ $corso->id }}">
                                    <div>
                                        <label class="block text-gray-700 text-sm font-bold mb-2">Orari Disponibili</label>
                                        <label for="orarion1">09:00</label>
                                        <input type="radio" id="orario1" name="orario" value="09:00" class="me-3 rounded">

                                        <label for="orarion1">14:00</label>
                                        <input type="radio" id="orario2" name="orario" value="14:00" class="me-3 rounded">

                                        <label for="orarion1">18:00</label>
                                        <input type="radio" id="orario3" name="orario" value="18:00" class="me-3 rounded">

                                        <label for="orarion1">20:00</label>
                                        <input type="radio" id="orario4" name="orario" value="20:00" class="me-3 rounded">
                                    </div>
                                    <button type="submit" class="btn btn-primary m-auto text-primary">Prenota</button>
                                </form>
                                </div>
                                @endif

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
    </div>


    </div>
</x-app-layout>

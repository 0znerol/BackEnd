<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
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

            <div class="container">
            <h5 class="card-title text-xl font-semibold">Corsi</h5>

                <div class="row">
                    @foreach($corsi as $corso)
                        <div class="col-4  my-3" style="max-height: 480px;">
                            <div class="card m-auto" style="width: 18rem; height: 100%;">
                                <img src="{{ $corso->thumb }}" class="card-img-top" alt="{{ $corso->title }}">
                                <div class="card-body d-flex flex-column p-0 px-1  " style="height: 50%;">
                                    <h5 class="card-title text-xl font-semibold">{{ $corso->title }}</h5>
                                    <p class="card-text">{{ $corso->description }}</p>
                                </div>
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
                                <form action="{{ route('prenotazione.store') }}" method="post" class="d-flex mb-2">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="corso_id" value="{{ $corso->id }}">
                                    <button type="submit" class="btn btn-primary m-auto text-primary">Prenota</button>
                                </form>
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

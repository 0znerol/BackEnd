<x-app-layout>
    <x-slot name="header">
        <div class="d-flex">
            <h2 class="font-semibold text-xl text-center mt-2 text-gray-800 leading-tight">
                {{ __('Dettaglio Corso') }}
            </h2>
        </div>

    </x-slot>
    <div class="p-2">
        <div class="card m-auto w-75" >
            <div class="d-flex">
            <img src="{{ $corso->thumb }}" class="card-img-top w-50 border rounded m-1" alt="{{ $corso->title }}">
            <div class="d-flex flex-column justify-content-center w-50 border rounded p-1 m-1">
            <h1 class="card-title text-xl font-semibold">Prenota Corso </h1>
            <form action="{{ route('prenotazione.store') }}" method="post" class="col m-auto">
                @csrf
                @method('POST')
                <input type="hidden" name="corso_id" value="{{ $corso->id }}">
                <div class="row mt-4">
                    <div class="col">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Orari Disponibili</label>
                    <label for="orarion1">09:00</label>
                    <input type="radio" id="orario1" name="orario" value="09:00" class="me-3 rounded">

                    <label for="orarion1">14:00</label>
                    <input type="radio" id="orario2" name="orario" value="14:00" class="me-3 rounded">
                    </div>
                </div >
                <div class="row">
                    <div class="col">

                    <label for="orarion1">18:00</label>
                    <input type="radio" id="orario3" name="orario" value="18:00" class="me-3 rounded">

                    <label for="orarion1">20:00</label>
                    <input type="radio" id="orario4" name="orario" value="20:00" class="me-3 rounded">
                    </div>
                </div>
                <div class="row text-end mt-5 w-100">
                    <button type="submit" class="btn btn-primary text-primary">Prenota</button>
                </div>
            </form>
            </div>
            </div>
            <div class="card-body">
                <h5 class="card-title text-xl font-semibold">{{ $corso->title }}</h5>
                <p class="card-text">{{ $corso->description }}</p>
                <a href="{{ route('corso.index') }}" class="btn border mt-2 text-primary">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>

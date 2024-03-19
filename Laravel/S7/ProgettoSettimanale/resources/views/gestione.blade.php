<x-app-layout>
<x-slot name="header">
        <div class="d-flex">
            <h2 class="font-semibold text-xl text-center mt-2 text-gray-800 leading-tight">
                {{ __('Admin/Gestione Prenotazioni') }}
            </h2>
        </div>

    </x-slot>
    @if($prenotazioni)
        <div class="container mt-2">
            <div class="row">
                <div class="text-center mt-1"> 
                    <h1 class="text-2xl font-semibold p-3 text-warning border border-warning rounded">Prenotazioni in attesa</h1>
                </div>
                @foreach($prenotazioni as $prenotazione)
                    @if($prenotazione->stato == 'in attesa')
                    <div class="col-md-6 col-lg-4  my-3" style="max-height: 600px;">
                        <div class="card m-auto" style="width: 18rem; height: 100%;">
                            <div class="card-body d-flex flex-column p-0 px-1  " style="height: 50%;">
                            <form action="{{ route('prenotazione.update', $prenotazione->id) }}" method="post" class="d-flex mb-2">
                                    @csrf
                                    @method('PUT')
                                    <select name="stato" id="stato" class="form-select" aria-label="">
                                        <option value="confermata">Confermata</option>
                                        <option value="rifiutata">Rifiutata</option>
                                        <option value="in attesa" selected>In attesa</option>
                                    </select>
                                    <button type="submit" class="btn btn-success m-auto text-success">Update</button>
                                </form>
                                @foreach($users as $user)
                                    @if($user->id == $prenotazione->user_id)
                                    <div class="d-flex justify-content-between">
                                        <p class="card-text">Utente: {{ $user->name }}</p>
                                        <p class="card-text">orario:  {{ $prenotazione->orario }}</p>
                                    </div>
                                    @endif
                                @endforeach
                                @foreach($corsi as $corso)
                                    @if($corso->id == $prenotazione->corso_id)
                                        <img src="{{ $corso->thumb }}" class="card-img-top" alt="{{ $corso->title }}">
                                        <h2 class="card-title text-xl font-semibold">{{ $corso->title }}</h2>
                                        <p class="card-text">{{ $corso->description }}</p>

                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                <div class="text-center"> 
                    <h1 class="text-2xl font-semibold p-3 text-success border border-success rounded">Prenotazioni Confermate</h1>
                </div>
                @foreach($prenotazioni as $prenotazione)
                    @if($prenotazione->stato == 'confermata')
                    <div class="col-md-6 col-lg-4  my-3" style="max-height: 600px;">
                        <div class="card m-auto" style="width: 18rem; height: 100%;">
                            <div class="card-body d-flex flex-column p-0 px-1  " style="height: 50%;">
                                <form action="{{ route('prenotazione.update', $prenotazione->id) }}" method="post" class="d-flex mb-2">
                                    @csrf
                                    @method('PUT')
                                    <select name="stato" id="stato" class="form-select" aria-label="Default select example">
                                        <option value="confermata" selected>Confermata</option>
                                        <option value="rifiutata">Rifiutata</option>
                                        <option value="in attesa">In attesa</option>
                                    </select>
                                    <button type="submit" class="btn btn-success m-auto text-success">Update</button>
                                </form>
                                @foreach($users as $user)
                                    @if($user->id == $prenotazione->user_id)
                                    <div class="d-flex justify-content-between">
                                        <p class="card-text">Utente: {{ $user->name }}</p>
                                        <p class="card-text">orario:  {{ $prenotazione->orario }}</p>
                                    </div>
                                    @endif
                                @endforeach
 
                                @foreach($corsi as $corso)
                                    @if($corso->id == $prenotazione->corso_id)
                                        <img src="{{ $corso->thumb }}" class="card-img-top" alt="{{ $corso->title }}">
                                        <h2 class="card-title text-xl font-semibold">{{ $corso->title }}</h2>
                                        <p class="card-text">{{ $corso->description }}</p>

                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                <div class="text-center"> 
                    <h1 class="text-2xl font-semibold p-3 text-danger border border-danger rounded">Prenotazioni Rifiutate</h1>
                </div>
                @if($prenotazioni->count() > 0)
                @foreach($prenotazioni as $prenotazione)
                    @if($prenotazione->stato == 'rifiutata')
                    <div class="col-md-6 col-lg-4  my-3" style="max-height: 600px;">
                        <div class="card m-auto" style="width: 18rem; height: 100%;">
                            <div class="card-body d-flex flex-column p-0 px-1  " style="height: 50%;">
                            <form action="{{ route('prenotazione.update', $prenotazione->id) }}" method="post" class="d-flex mb-2">
                                    @csrf
                                    @method('PUT')
                                    <select name="stato" id="stato" class="form-select" aria-label="Default select example">
                                        <option value="confermata">Confermata</option>
                                        <option value="rifiutata" selected>Rifiutata</option>
                                        <option value="in attesa">In attesa</option>
                                    </select>
                                    <button type="submit" class="btn btn-success m-auto text-success">Update</button>
                                </form>
                                @foreach($users as $user)
                                    @if($user->id == $prenotazione->user_id)
                                    <div class="d-flex justify-content-between">
                                        <p class="card-text">Utente: {{ $user->name }}</p>
                                        <p class="card-text">orario:  {{ $prenotazione->orario }}</p>
                                    </div>
                                    @endif
                                @endforeach
                                @foreach($corsi as $corso)
                                    @if($corso->id == $prenotazione->corso_id)
                                        <img src="{{ $corso->thumb }}" class="card-img-top" alt="{{ $corso->title }}">
                                        <h2 class="card-title text-xl font-semibold">{{ $corso->title }}</h2>
                                        <p class="card-text">{{ $corso->description }}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
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
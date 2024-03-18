<x-app-layout>
    <div class="p-2">
    <div class="">
        <a href="{{ route('progetto.create')  }}" class="btn border-success rounded text-success">Crea Progetto</a>
        </div>
        @if ($progetto->count() > 0)
            <table class="table table-dark text-white">
                <thead>
                    <tr>
                        <th >Titolo</th>
                        <th >Descrizione</th>
                        <th >Attivita</th>
                        <th >Thumbnail</th>
                        <th >Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($progetto as $prog)
                        <tr>
                            <td><a href="{{ route('progetto.show', $prog->id) }}" class="m-auto underline ">{{ $prog->title }}</a></td>
                            <td>{{ $prog->description }}</td>
                            <td>
                            @if ($prog->attivita->isNotEmpty())
                                <ul class="list-group p-2">
                                    @foreach ($prog->attivita as $att)
                                        @if ($att->progetto_id == $prog->id)
                                            <li class="border-b-2 border-inherit my-3">{{ $att->title }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-danger">nessuna attivita trovata</p>
                                <p class="text-danger">per aggiungere un attivita clicca sul nome</p>
                            @endif
                            </td>
                            <td>
                                <img src="{{ $prog->thumb }}" alt="{{ $prog->title }}" class="img-fluid" style="min-width:200px; min-height:200px;">
                            </td>
                            <td class="text-center">
                                    <a type="button" class="btn border-danger rounded text-danger mb-2" href="/progetto/{{$prog->id}}/destroy">Delete</a>
                                    <a href="{{ route('progetto.edit', $prog->id) }}" class="btn border-warning rounded  text-warning">Edit</a>
                            </td>
                
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>No progettos found.</p>                   
            @endif
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="p-2">
    <div class="">
        <a href="{{ route('progetto.create')  }}" class="btn border rounded text-white">Create Progetto</a>
        </div>
        @if ($progetto->count() > 0)
            <h1 class="text-white">Progetti</h1>    
            <table class="table-auto text-white">
                <thead>
                    <tr>
                        <th >Title</th>
                        <th >Description</th>
                        <th >Attivita</th>
                        <th class="" >Thumbnail</th>
                        <th >Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($progetto as $prog)
                        <tr>
                            <td class="border"><a href="{{ route('progetto.show', $prog->id) }}" class="m-auto underline ">{{ $prog->title }}</a></td>
                            <td class="border">{{ $prog->description }}</td>
                            <td class="border">
                                <ul class="list-group p-2">
                                    @foreach ($prog->attivita as $att)
                                    @if ($att->progetto_id == $prog->id)
                                    <li class="border-b-2 border-inherit my-3">{{ $att->title }}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </td>
                            <td class="border">
                                <img src="{{ $prog->thumb }}" alt="{{ $prog->title }}" class="img-fluid" style="min-width:200px; min-height:200px;">
                            </td>
                            <td class="border">
                                <a href="{{ route('progetto.edit', $prog->id) }}" class="btn border rounded">Edit</a>
                                <a type="button" class="btn btn-outline-danger" href="/progetto/{{$prog->id}}/destroy">Delete</a>
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

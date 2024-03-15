<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div>
    <a href="{{ route('progetto.create')  }}" class="btn border rounded text-white">Create Progetto</a>
    <!-- <div>{{ Auth::user()->name }}</div> -->
    @if ($progetto->count() > 0)
        <h1 class="text-white">Progetti</h1>    
        <table class="table text-white">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Attivita</th>
                    <th scope="col">Thumbnail</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($progetto as $prog)
                <tr>
                    <td>{{ $prog->title }}</td>
                    <td>{{ $prog->description }}</td>
                    <td>
                        <ul class="list-group">
                            @foreach ($prog->attivita as $att)
                            @if ($att->progetto_id == $prog->id)
                            <li class="py-4 list-group-item list-group-item-action active">{{ $att->title }}</li>
                            @endif
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <img src="{{ $prog->thumb }}" alt="{{ $prog->title }}" class="img-fluid" style="max-width: 64px; max-height: 64px;">
                    </td>
                    <td>
                        <a href="{{ route('progetto.show', $prog->id) }}" class="btn btn-primary btn-sm">View</a>
                        <a href="{{ route('progetto.edit', $prog->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                        <form action="{{ route('progetto.destroy', $prog->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No progettos found.</p>                   
    @endif
    </div>
</x-app-layout>

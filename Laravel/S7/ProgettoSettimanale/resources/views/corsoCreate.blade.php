
<x-app-layout>
<x-slot name="header">
        <div class="d-flex">
            <h2 class="font-semibold text-xl text-center mt-2 text-gray-800 leading-tight">
                {{ __('Admin/Aggiungi Corso') }}
            </h2>
        </div>

    </x-slot>
    <div class="p-2">

    <form action="/corso" method="post">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input type="text" id="title" name="title" value="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea id="description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        </div>
        <div class="mb-4">
            <label for="thumb" class="block text-gray-700 text-sm font-bold mb-2">Thumbnail</label>
            <input type="text" id="thumb" name="thumb" value="https://via.placeholder.com/640x480.png/0055cc?text=" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>



        <input type="hidden" name="proj_id" value="">
        <div class="mb-4">
        </div>
        <button type="submit" class="btn border-success update text-success">Save</button>

    </form>
    <a href="{{ route('corso.index') }}" class="btn border-danger mt-2 text-danger">Back</a>
    </div>
</x-app-layout>

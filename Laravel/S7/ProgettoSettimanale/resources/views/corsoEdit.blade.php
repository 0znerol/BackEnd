
<x-app-layout>
    <form action="{{ route('corso.update', $corso->id) }}" method="post"  >
    @csrf
    @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input type="text" id="title" name="title" value="{{ $corso->title }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea id="description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $corso->description }}</textarea>
        </div>
        <div class="mb-4">
            <label for="thumb" class="block text-gray-700 text-sm font-bold mb-2">Thumbnail</label>
            <input type="text" id="thumb" name="thumb" value="{{ $corso->thumb }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <input type="hidden" name="id" value="{{ $corso->id}}">
        <div class="mb-4">
        </div>
        <button type="submit" class="btn border update ">Save</button>
    </form>

    <a href="{{ route('dashboard') }}" class="btn border">Back</a>
</x-app-layout>


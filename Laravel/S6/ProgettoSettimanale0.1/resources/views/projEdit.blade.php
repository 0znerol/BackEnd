<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>

<body>

    <form action="{{ route('progetto.update', $progetto->id) }}" method="post"  >
    @csrf
    @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input type="text" id="title" name="title" value="{{ $progetto->title }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea id="description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $progetto->description }}</textarea>
        </div>
        <div class="mb-4">
            <label for="thumb" class="block text-gray-700 text-sm font-bold mb-2">Thumbnail</label>
            <input type="text" id="thumb" name="thumb" value="{{ $progetto->thumb }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <input type="hidden" name="proj_id" value="{{ $progetto->id}}">
        <div class="mb-4">
        </div>

    </form>
    <button type="submit" class="btn border update">Save</button>

    <a href="{{ route('dashboard') }}" class="btn border">Back</a>
<script>
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    document.querySelector('button.update').addEventListener('click', update);

    function update() {
        let title = document.querySelector('input#title').value;
        let description = document.querySelector('textarea#description').value;
        let thumb = document.querySelector('input#thumb').value;
        let proj_id = document.querySelector('input[name="proj_id"]').value;

        fetch(`http://127.0.0.1:8000/progetto/${proj_id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({
                title: title,
                description: description,
                thumb: thumb
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            window.location.href = `http://localhost:8000/progetto/${proj_id}`;
        })
        .catch(error => console.log(error));
    }
</script>
</body>
</html>

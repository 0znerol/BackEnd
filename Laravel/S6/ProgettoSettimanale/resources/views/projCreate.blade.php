<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>

<body>

    <form action="{{ route('progetto.store') }}" method="POST"  >
    @csrf
    <!-- @method('POST') -->
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
            <input type="text" id="thumb" name="thumb" value="" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <input type="hidden" name="proj_id" value="">
        <div class="mb-4">
        </div>

    </form>
    <button type="submit" class="btn border update">Save</button>

    <a href="{{ route('dashboard') }}" class="btn border">Back</a>
<script>
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    document.querySelector('button.update').addEventListener('click', update);

    function update() {
  let input_title = document.querySelector('input#title').value;
  let input_description = document.querySelector('textarea#description').value;
  let input_thumb = document.querySelector('input#thumb').value;
  let input_proj_id = document.querySelector('input[name="proj_id"]').value;

  const formData = new FormData();
  formData.append('title', input_title);
  formData.append('description', input_description);
  formData.append('thumb', input_thumb);
  formData.append('proj_id', input_proj_id); // Add this line if you need to send proj_id

        fetch(`/api/progetto`, {
            method: 'POST',
            headers: {
            'X-CSRF-TOKEN': token
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Handle the response as needed
        })
        .catch(error => console.log(error));
}
</script>
</body>
</html>

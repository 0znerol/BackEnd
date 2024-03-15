<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Scripts -->
</head>
<body>
    <form action="{{ route('progetto.store') }}" method="POST">
        @csrf
        @method('POST')
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
    <button class="btn border update">Save</button>
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
            formData.append('proj_id', input_proj_id);

            // Fetch the CSRF token from the server
            fetch('http://127.0.0.1:8000/sanctum/csrf-cookie', {
                method: 'GET',
                credentials: 'include'
            })
            .then(response => {
                // Extract the XSRF-TOKEN cookie from the response
                // const xsrfToken = response.headers.get('X-XSRF-TOKEN');
                console.log(response);

                // Send the POST request with the XSRF-TOKEN cookie
                fetch('http://127.0.0.1:8000/api/progetto', {
                    method: 'POST',
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json, text-plain, */*",
                        'X-CSRF-TOKEN': token,
                        'X-XSRF-TOKEN': xsrfToken
                    },
                    body: JSON.stringify(Object.fromEntries(formData)),
                    credentials: 'include'
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                })
                .catch(error => console.log(error));
            })
            .catch(error => console.log(error));
        }
    </script>
</body>
</html>
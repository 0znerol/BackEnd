<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>

    <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body>
    <h1>LoggedUser</h1>
    <div class="user">
        <h2>User</h2>
        <h4>Name:</h4>
        <p class="name"></p>
        <h4>Email:</h4>
        <p class="email"></p>
    </div>


    <!-- <div class="register">
        <button>Register</button>
    </div> -->
    <!-- <div class="login">
        <button>Login</button>
    </div>
    <div class="logout">
        <button>Logout</button>
    </div>
    <div class="user">
        <button>User</button>
    </div> -->
    <div class="logout">
        <button>Logout</button>
    </div>
    <script>
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        // document.querySelector('div.login').addEventListener('click', login);
        document.querySelector('div.logout').addEventListener('click', logout);
        // document.querySelector('div.user').addEventListener('click', getUser);

            fetch('http://127.0.0.1:8000/api/user')
                .then(response => response.json())
                .then(json => {console.log(json); 
                    document.querySelector('p.name').innerText = json.name;
                    document.querySelector('p.email').innerText = json.email;
                
                })
                .catch(error => console.log(error));

            function logout() {
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                fetch('http://127.0.0.1:8000/logout', {
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json, text-plain, */*",
                            "X-CSRF-TOKEN": token
                            },
                        method: 'POST',
                    })
                    .then(response => response.json())
                    .then(json => {console.log(json); 
                        window.location.href = "http://127.0.0.1:8000";})
                    .catch(error => console.log(error));
            }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
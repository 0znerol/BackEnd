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
    <h1>Register</h1>

    <form>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password">
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation">
        </div>
    </form>
    <button class="btn btn-primary register">Submit</button>

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

    <script>
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        document.querySelector('button.register').addEventListener('click', register);
        // document.querySelector('div.login').addEventListener('click', login);
        // document.querySelector('div.logout').addEventListener('click', logout);
        // document.querySelector('div.user').addEventListener('click', getUser);

        function register(){

            let obj = {
                name: document.querySelector('#name').value,
                email: document.querySelector('#email').value,
                password: document.querySelector('#password').value,
                password_confirmation: document.querySelector('#password_confirmation').value
            }

            fetch('http://127.0.0.1:8000/register', {
                    method: 'POST',
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json, text-plain, */*",
                        "X-CSRF-TOKEN": token
                    },
                    body: JSON.stringify(obj)
                })
                .then(response => response.json())
                .then(json => {console.log(json); window.location.replace("http://127.0.0.1:8000/loggedUser?usr="+json.user.email);})
                .catch(error => console.log(error))
        }

        function login(){
            let obj = {
                email: "m.rossi@example.com",
                password: "Pa$$w0rd!"
            }

            fetch('http://127.0.0.1:8000/login', {
                    method: 'POST',
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json, text-plain, */*",
                        "X-CSRF-TOKEN": token
                    },
                    body: JSON.stringify(obj)
                })
                .then(response => response.json())
                .then(json => console.log(json))
                .catch(error => console.log(error))
        }



        function getUser() {
            fetch('http://127.0.0.1:8000/api/user')
                .then(response => response.json())
                .then(json => console.log(json))
                .catch(error => console.log(error));
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
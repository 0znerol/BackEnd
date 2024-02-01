<?php
        //var_dump($_SERVER);
        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                echo "email non valida";
                return;
            }
            $passLen = strlen($_POST['password']);
            $safePass = $_POST['password'];
            for($i = 0; $i < $passLen; $i++){
               $safePass[$i] = "*";
            }
            echo "<h3>"."Email: " . $_POST['email'] ."</h3>"."<h3>"."Name: " . $_POST['name'] ."</h3>". "<br>" ."<h4>". "password: " . $safePass ."</h4>";

            session_start(); // inizializza una sessione su browser del client
            $_SESSION = [
                'name' => $_POST['name'],
                'email' => $_POST['email'], 
                'password' => $safePass
            ];
            
            session_write_close();
            header('Location: http://localhost:4000/index.php');
        }

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button><a href="index.php">home</a></button>

</body>
</html>
<?php
    require_once 'config.php';

    $mysqli = new mysqli(
        $config['host'],
        $config['username'],
        $config['password'],
        $config['database']
    );

    if($mysqli->connect_error) { die($mysqli->connect_error); }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        $result = $mysqli->query($query);

        if ($result) {
            echo "User added successfully!";
            header('Location: http://localhost:6060/BackEnd/S1/L4/index.php');

        } else {
            echo "Error adding user: " . $mysqli->error;
        }
    }
?>
<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();
    $_SESSION['is_modding'] = false;


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
        $password = $_POST['password'];
        $id = $_POST['id']; 

        $query = "UPDATE users SET name = '$name', email = '$email', password = 'password' WHERE id = '$id'";
        $result = $mysqli->query($query);
        var_dump($_POST);

        if ($result) {
            echo "User added successfully!";

            header('Location: http://localhost:6060/BackEnd/S1/L4/index.php');

        } else {
            echo "Error adding user: " . $mysqli->error;
        }
        
        header('Location: http://localhost:6060/BackEnd/S1/L4/index.php');
    }

?>
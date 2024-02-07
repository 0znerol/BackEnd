<?php
require_once 'config.php';

$mysqli = new mysqli(
    $config['host'],
    $config['username'],
    $config['password'],
    $config['database']
);

if ($mysqli->connect_error) {
    die($mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $release = date('d-m-Y', strtotime($_POST['relese']));
    var_dump($release);

    $query = "INSERT INTO books (title, author, relese, genere) VALUES ('$_POST[title]', '$_POST[author]', '$release', '$_POST[genere]')";
    $result = $mysqli->query($query);

    if ($result) {
        echo "User added successfully!";
        header('Location: http://localhost:6060/BackEnd/S1/PS/index.php');


    } else {
        echo "Error adding user: " . $mysqli->error;
    }
}


?>
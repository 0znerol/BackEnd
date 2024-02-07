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
if ($mysqli->connect_error) {
    die($mysqli->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);


    $query = "UPDATE books SET title = '$_POST[title]', author = '$_POST[author]', relese = '$_POST[relese]', genere = '$_POST[genere]' WHERE id = '$_POST[id]'";

    $result = $mysqli->query($query);

    if ($result) {
        echo "User added successfully!";
        header('Location: http://localhost:6060/BackEnd/S1/PS/index.php');

    } else {
        echo "Error adding user: " . $mysqli->error;
    }

    // header('Location: http://localhost:6060/BackEnd/S1/PS/index.php');
}

?>
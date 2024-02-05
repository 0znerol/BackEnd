<?php

require_once 'config.php';

$mysqli = new mysqli(
    $config['host'],
    $config['username'],
    $config['password'],
    $config['database']
);

if($mysqli->connect_error) { die($mysqli->connect_error); }
var_dump($_GET['id']);
if ($_SERVER['REQUEST_METHOD'] === 'GET') {


    $query = "DELETE FROM users WHERE id = '$_GET[id]'";
    $result = $mysqli->query($query);

    if ($result) {
        echo "User deleted successfully!";
        header('Location: http://localhost:6060/BackEnd/S1/L4/index.php');

    } else {
        echo "Error adding user: " . $mysqli->error;
    }
}
?>
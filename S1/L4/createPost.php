<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once 'config.php';
$mysqli = new mysqli(
    $config['host'],
    $config['username'],
    $config['password'],
    $config['database']
    );

if($mysqli->connect_error) { die($mysqli->connect_error); } 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // your database connection code here

    $user_mail = $_SESSION['user_mail'];
    $post_title = $_POST['postTitle'];
    $post_body = $_POST['postBody'];

    $query = "INSERT INTO posts (user, title, body) VALUES ('$user_mail', '$post_title', '$post_body')";
    $result = $mysqli->query($query);

    if ($result) {
        echo "Post created successfully!";
        header('Location: http://localhost:6060/BackEnd/S1/L4/index.php');

    } else {
        echo "Error creating post: " . $mysqli->error;
    }

    $mysqli->close();
}
?>

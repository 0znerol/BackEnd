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
    $query = "UPDATE books SET titolo = ?, autore = ?, anno_pubblicazione = ?, genere = ? WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    if (!$stmt) {
        echo "Error preparing statement: " . $mysqli->error;
    } else {
        $stmt->bind_param('ssisi', $_POST['title'], $_POST['author'], $_POST['relese'], $_POST['genere'], $_POST['id']);
        if ($stmt->execute()) {
            echo "Book updated successfully!";
            header('Location: http://localhost:6060/BackEnd/S1/PS/index.php');
            exit();
        } else {
            echo "Error updating book: " . $mysqli->error;
        }
        $stmt->close();
    }
}

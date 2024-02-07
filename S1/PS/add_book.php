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
    // Check if file was uploaded without errors
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        // Set the upload directory path
        $uploadDir = 'uploads/';
        var_dump($_POST);
        // Create the directory if it doesn't exist
        if (!file_exists($uploadDir) && !is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Generating a new filename (you can change the naming convention as per your requirement)
        $fileExtension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $filename = $_POST['title'] . '.' . $fileExtension;

        // Move the uploaded file to the desired location with the new filename
        $destination = $uploadDir . $filename;
        // echo $_FILES['file']['tmp_name'] . '.' . $fileExtension;
        if (move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {
            // File was uploaded successfully, now insert the file location into the database
            $release = date('d-m-Y', strtotime($_POST['release']));
            $query = "INSERT INTO books (titolo, autore, anno_pubblicazione, genere, book_dir) VALUES ('$_POST[title]', '$_POST[author]', '$release', '$_POST[genre]', '$destination')";
            $result = $mysqli->query($query);
            var_dump($result);

            if ($result) {
                echo "Book added successfully!";
                header('Location: http://localhost:6060/BackEnd/S1/PS/index.php');
                exit;
            } else {
                echo "Error adding book: " . $mysqli->error;
            }
        } else {
            // Error moving file, provide more details about the error
            $lastError = error_get_last();
            echo "Error moving file to destination: " . $lastError['message'];
        }
    } else {
        echo "Error uploading file: " . $_FILES['file']['error'];
    }
}
?>
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
        if (move_uploaded_file($_FILES['file']['tmp_name'], $destination) && $fileExtension == 'txt' || $fileExtension == 'doc' || $fileExtension == 'pdf' || $fileExtension == 'epub') {
            // File was uploaded successfully, now insert the file location into the database
            $release = date('d-m-Y', strtotime($_POST['release']));
            $query = "INSERT INTO books (titolo, autore, anno_pubblicazione, genere, book_dir) 
            SELECT ?, ?, ?, ?, ?
            FROM DUAL 
            WHERE NOT EXISTS (
                SELECT 1 FROM books 
                WHERE titolo = ? 
                AND autore = ?
                AND anno_pubblicazione = ?
                AND genere = ?
                AND book_dir = ?
            )";

            // Prepare the statement
            $stmt = $mysqli->prepare($query);

            // Bind parameters
            $stmt->bind_param("ssssssssss", $_POST['title'], $_POST['author'], $release, $_POST['genre'], $destination, $_POST['title'], $_POST['author'], $release, $_POST['genre'], $destination);

            // Execute the statement
            $result = $stmt->execute();

            // Check if the query was successful
            if ($result) {
                echo "Book added successfully!";
                header('Location: http://localhost:6060/BackEnd/S1/PS/index.php');
                exit;
            } else {
                echo "Error adding book: " . "<br/>" . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            // Error moving file, provide more details about the error
            $lastError = error_get_last();
            echo "Error moving file to destination, file type may not be supported. " . "<br/>" . $lastError['message'];
        }
    } else {
        echo "Error uploading file: " . $_FILES['file']['error'];
    }
}
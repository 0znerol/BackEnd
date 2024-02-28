<?php
require_once 'config.php';
$conn = mysqli_connect($config['mysql_host'], $config['mysql_user'], $config['mysql_password'], $config['mysql_db']);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM users";
$users = $conn->query($sql);
if ($users->num_rows > 0) {
    if (!is_dir('CSV')) {
        mkdir('CSV', 0777, true);
    }
    $file = fopen("CSV/users.csv", "w");
    fputcsv($file, array('id', 'username', 'email', 'pass'));
    while ($row = $users->fetch_assoc()) {
        print_r($row);
        fputcsv($file, $row);
    }
    fclose($file);
    echo "CSV file created successfully!";
    header("Location: index.php");
} else {
    echo "No data found in the users table.";
}
$conn->close();

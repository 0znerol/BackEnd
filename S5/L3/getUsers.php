<?php
    include_once 'config.php';

    $conn = mysqli_connect($config['mysql_host'], $config['mysql_user'], $config['mysql_password'], $config['mysql_db']);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // session_destroy();
        session_start();

        while ($row = mysqli_fetch_assoc($result)) {


            $_SESSION['allUsers'][] = $row; 
        }
         } else {
        echo "0 results";
    }


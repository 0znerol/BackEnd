<?php
include_once 'config.php';
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$conn = mysqli_connect($config['mysql_host'], $config['mysql_user'], $config['mysql_password'], $config['mysql_db']);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM users where email = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $_POST['email']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) > 0) {
    // session_destroy();
    session_start();

    while ($row = mysqli_fetch_assoc($result)) {
        // print_r($row['pass']);
        if (password_verify($_POST['password'], $row['pass'])) {
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $email = $_POST['email'];

            $sql = "UPDATE users SET username=?, pass=?, email=? WHERE email = ?";
            $stmt = mysqli_prepare($conn, $sql);

            mysqli_stmt_bind_param($stmt, "ssss", $username, $password, $email , $_POST['email']);
            // $_SESSION['user'] = $row;
            header("Location: index.php");
        } else {
            echo "Wrong password";
        }
    }
     } else {
    echo "0 results";
}
// if ($_POST['password']  )

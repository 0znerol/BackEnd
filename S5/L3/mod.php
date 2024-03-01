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
    session_start();

    while ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($_POST['password'], $row['pass'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];

            $sql = "UPDATE users SET username=? WHERE email = ?";
            $stmt = mysqli_prepare($conn, $sql);

            mysqli_stmt_bind_param($stmt, "ss", $username, $email);
            mysqli_stmt_execute($stmt); // Execute the update statement

            // Optionally, you can update the session if needed
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;

            header("Location: index.php");
            exit(); // Make sure to exit after redirecting
        } else {
            echo "Wrong password";
        }
    }
} else {
    echo "0 results";
}
?>

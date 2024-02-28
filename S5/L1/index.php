<?php
require_once 'config.php';
$conn = mysqli_connect($config['mysql_host'], $config['mysql_user'], $config['mysql_password'], $config['mysql_db']);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";

include 'form.php';
?>
<form action="csvConvert.php" method="POST">
    <input type="submit" value="Convert">
</form>
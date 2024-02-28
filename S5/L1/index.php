<?php
include 'head.php';
require_once 'config.php';
$conn = mysqli_connect($config['mysql_host'], $config['mysql_user'], $config['mysql_password'], $config['mysql_db']);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<body class="bg-dark">
    <div class="text-center w-50 m-auto text-white">
        <?php
        include 'form.php';
        ?>
        <form action="csvConvert.php" method="POST">
            <button type="submit" class="btn btn-primary">Convert</button>
        </form>
    </div>
</body>
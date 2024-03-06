<?php
include('head.php');
session_start();
// if($_SERVER['REQUEST_URI'] == '/BackEnd/BackEnd/S5/Progetto_Settimanale/login.php/log_auth.php ') {
//     header("Location: login.php/error=1");
//     // exit();
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body class="d-flex flex-column align-items-center bg-dark">
    <h2 class="text-light">Login</h2>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form action="log_auth.php" method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="pass" placeholder="Password" required><br>
        <button type="submit" class="btn border text-light">Login</button>
    </form>
    <h2 class="text-light">Register</h2>
    <form action="register.php" method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="pass" placeholder="Password" required><br>
        <button type="submit" class="btn border text-light">Register</button>
    </form>
    <?php if (isset($_GET['error'])) { 
                // print_r($_SESSION['error']);
                echo '<p class="bg-danger text-white rounded p-2">'.$_GET['error'].'</p>';
        } ?>

</body>
</html>
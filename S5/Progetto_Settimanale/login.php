<?php
include('head.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body class="d-flex flex-column align-items-center">
    <h2>Login</h2>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form action="log_auth.php" method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="pass" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
    <h2>Register</h2>
    <form action="register.php" method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="pass" placeholder="Password" required><br>
        <button type="submit">Register</button>
    </form>
    <?php if (isset($_GET['error'])) { 
            if($_GET['error'] == 1) {
                echo '<p class="bg-danger text-white rounded p-2">Username o password errati</p>';
            } 
        } ?>

</body>
</html>
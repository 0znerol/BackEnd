<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Include necessary classes and files
require_once('database.php');
include('usersDTO.php');
include('head.php');
include('userClass.php');

$config = require_once('config.php');

use db\DB_PDO as DB;

$PDOConn = DB::getInstance($config); 
$conn = $PDOConn->getConnection();

// Check if user is logged in
if (isset($_SESSION['loggedUser'])) {
    $usersDTO = new UsersDTO($conn);
    $res = $usersDTO->getAll();
    $loggedUser = $usersDTO->getUsersByID($_SESSION['loggedUser']);
?>

    <!-- HTML part -->
    <div class='d-flex justify-content-between'>
        <h1>Benvenuto <?php echo $loggedUser['username'] ?></h1>
        <a href="logout.php" class="m-2"><button class="btn border">Logout</button></a>
    </div>
    <h2>User List</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Modifica</th>
                <th scope="col">Elimina</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($res as $user) { ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo str_repeat('*', strlen($user['pass'])/6); ?></td>
                    <?php if($loggedUser['username'] == 'admin' || $user['id'] == $_SESSION['loggedUser']) { ?>
                        <td><a href="index.php?mod=true&id=<?php echo $user['id']; ?>"><button class="btn border">Modifica</button></a></td>
                        <td><a href="delete.php?id=<?php echo $user['id']; ?>"><button class="btn border">Elimina</button></a></td>
                    <?php } else { ?>
                        <td></td>
                        <td></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php if(isset($_GET['mod']) && $_GET['mod'] == true) {
        $user = $usersDTO->getUsersByID($_GET['id']);
    ?>
        <!-- Display form for modification -->
        <div class="card m-5">
        <h2 class="m-auto">Modifica Utente "<?php echo $user['username']; ?>" </h2>
        <form action="update.php" method="post" class="m-2">
            <input class="form-control" type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <label class="form-label" for="username">Username</label>
            <input class="form-control" type="text" name="username" value="<?php echo $user['username']; ?>" required><br>
            <label class="form-label" for="email">Email</label>
            <input class="form-control" type="email" name="email" value="<?php echo $user['email']; ?>" required><br>
            <label class="form-label" for="password">Password</label>
            <input class="form-control" type="password" name="pass" value="" placeholder="Verifica Password" required><br>
            <button type="submit">Modifica</button>
        </form>
        </div>
    <?php } ?>

<?php 
} else {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit();
}
?>

<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Include necessary classes and files
require_once('Classes/database.php');
include('Classes/usersDTO.php');
include('head.php');
include('Classes/userClass.php');

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
    <body class="bg-dark">
    <div class='d-flex justify-content-between'>
        <h1 class="text-white">Benvenuto <?php echo $loggedUser['username'] ?></h1>
        <a href="logout.php" class="m-2"><button class="btn border border-danger text-danger bg-dark p-1 px-4"><i class="bi bi-box-arrow-left me-1"></i></button></a>
    </div>
    <h2 class="text-white">User List</h2>
    <table class="table table-dark table-striped">
        <thead>
            <tr class="text-center">
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
                <tr class="text-center">
                    <td><p class="mt-3"><?php echo $user['id']; ?></p></td>
                    <td><p class="mt-3"><?php echo $user['username']; ?></p></td>
                    <td><p class="mt-3"><?php echo $user['email']; ?></p></td>
                    <td><p class="mt-3"><?php echo str_repeat('*', strlen($user['pass'])/6); ?></p></td>
                    <?php if($loggedUser['username'] == 'admin' || $user['id'] == $_SESSION['loggedUser']) { ?>
                        <td><a href="index.php?mod=true&id=<?php echo $user['id']; ?>"><button class="btn border border-warning text-warning mt-3"><i class="bi bi-pencil-fill"></i></button></a></td>
                        <td><a href="delete.php?id=<?php echo $user['id']; ?>"><button class="btn border border-danger text-danger mt-3"><i class="bi bi-trash-fill"></i></button></a></td>
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
        <div class="card m-5 bg-dark border-dark-subtle">
            <div class="d-inline-flex">
                <h2 class="m-auto text-light">Modifica Utente "<?php echo $user['username']; ?>" </h2>
                <a href="index.php" class="text-danger pt-2 pe-2"><i class="bi bi-x-lg border rounded border-danger"></i></a>
            </div>
        <form action="update.php" method="post" class="m-2">
            <input class="form-control" type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <label class="form-label" for="username">Username</label>
            <input class="form-control" type="text" name="username" value="<?php echo $user['username']; ?>" required><br>
            <label class="form-label" for="email">Email</label>
            <input class="form-control" type="email" name="email" value="<?php echo $user['email']; ?>" required><br>
            <label class="form-label" for="password">Password</label>
            <input class="form-control" type="password" name="pass" value="" placeholder="Verifica Password" required><br>
            <button type="submit" class="btn border border-success text-success">Accetta</button>
        </form>
        <?php if(isset($_GET['error'])) { ?>
            <p class="m-auto bg-danger text-white rounded p-2"> <?php echo $_GET['error']; ?> </p>
        <?php } ?>
        </div>
    </body>
    <?php } ?>

<?php 
} else {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit();
}
?>

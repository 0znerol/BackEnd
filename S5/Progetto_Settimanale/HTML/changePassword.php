<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once('head.php');
require_once('../Classes/database.php');
include('../Classes/usersDTO.php');
include('../Classes/userClass.php');
$config = require_once('../config.php');
use db\DB_PDO as DB;
$PDOConn = DB::getInstance($config);
$conn = $PDOConn->getConnection();

if (isset($_SESSION['loggedUser'])) {
    $usersDTO = new UsersDTO($conn);
    $user = $usersDTO->getUsersByID($_GET['id']);
} else {
    header("Location: HTML/login.php");
    exit();
}

?>
<!-- Display form for modification -->
<body class="bg-dark">
<div class="card m-5 bg-dark border-dark-subtle">
    <div class="d-inline-flex">
        <h2 class="m-auto text-light">Modifica Password "<?php echo $user['username']; ?>" </h2>
        <a href="index.php" class="text-danger pt-2 pe-2"><i class="bi bi-x-lg border rounded border-danger"></i></a>
    </div>
<form action="../update_pass.php" method="post" class="m-2">
    <input class="form-control" type="hidden" name="id" value="<?php echo $user['id']; ?>">
    <label class="form-label text-light" for="pass">Nuova Password</label>
    <input class="form-control" type="password" name="pass" value="" placeholder="Nuova Password" required><br>
    <label class="form-label text-light" for="pass2">Verifica password</label>
    <input class="form-control" type="password" name="pass2" value="" placeholder="Verifica Password" required><br>
    <button type="submit" class="btn border border-success text-success">Accetta</button>
    <!-- <a href="/HTML/changePassword.php"><button class="btn border border-warning text-warning">Password Dimenticata</button></a> -->
</form>

<?php if(isset($_GET['error'])) { ?>
    <p class="m-auto bg-danger text-white rounded p-2"> <?php echo $_GET['error']; ?> </p>
<?php } ?>
</div>
</body>
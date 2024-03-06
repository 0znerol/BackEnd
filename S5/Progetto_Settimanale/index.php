<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
// Includi le classi necessarie
require_once('users.php');
require_once('database.php');
include('usersDTO.php');

$config = require_once('config.php');

use db\DB_PDO as DB;

//$db = new DB($config);
//print_r($db->conn);

//var_dump(DB::getInstance($config));

// Il metodo getInstance della classe Singleton ritorna una istanza
// se è già presente altrimenti la crea e la ritorna
$PDOConn = DB::getInstance($config); 
$conn = $PDOConn->getConnection();

// Gestione delle richieste
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     if (isset($_POST['username']) && isset($_POST['password'])) {
//         $username = $_POST['username'];
//         $password = $_POST['password'];

//         // Verifica le credenziali dell'utente
//         // (Devi implementare questa parte)
//         if (verificaCredenziali($username, $password)) {
//             $_SESSION['logged_in'] = true;
//             $_SESSION['username'] = $username;
//             header("Location: dashboard.php");
//             exit();
//         } else {
//             $error = "Credenziali non valide.";
//         }
//     }
// }

// Pagina di login
if (!isset($_SESSION['loggedUser']) || $_SESSION['loggedUser'] !== true) {
    // $users = $usersDTO->getUserForLogin($_POST['username']);
    // print_r($users);
    $usersDTO = new UsersDTO($conn);
    $res = $usersDTO->getAll();
    // print_r($res);
?>
    <h2>User List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Modifica</th>
        </tr>
        <?php foreach ($res as $user) {?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['pass']; ?></td>
                <td><a href="index.php?mod=true&id=<?php echo $user['id']; ?>">Modifica</a></td>
            </tr>
        <?php } ?>
    </table>
    

<?php 
if(isset($_GET['mod']) && $_GET['mod'] == true) {
    $user = $usersDTO->getUsersByID($_GET['id']);
    // print_r($user);
    ?>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <input type="text" name="username" value="<?php echo $user['username']; ?>" required><br>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br>
        <input type="password" name="pass" value="<?php echo $user['pass']; ?>" required><br>
        <button type="submit">Modifica</button>
    </form>
<?php } ?>

 
<?php


}else{
    header("Location: login.php");
    exit();
}
?>

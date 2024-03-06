<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
// Includi le classi necessarie

require_once('Classes/database.php');
include('Classes/usersDTO.php');
include('Classes/userClass.php');


$config = require_once('config.php');

use db\DB_PDO as DB;

$PDOConn = DB::getInstance($config); 
$conn = $PDOConn->getConnection();

$usersDTO = new UsersDTO($conn);
// print_r($_POST);
if(isset($_POST['username'])) {
    $users = $usersDTO->getUserForLogin($_POST['username']);
    // print_r($users);


    if(password_verify($_POST['pass'], $users['pass'])) {
        $_SESSION['loggedUser'] = $users['id'];
        header("Location: index.php");
        exit();
    } else {

        header("Location: login.php?error=Password errata");
    }
    header("Location: login.php?error=Utente o password errati");

}



//print_r($db->conn);


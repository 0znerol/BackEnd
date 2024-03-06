<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once('Classes/database.php');
include('Classes/usersDTO.php');
include('HTML/head.php');
include('Classes/userClass.php');
$config = require_once('config.php');
use db\DB_PDO as DB;
$PDOConn = DB::getInstance($config); 
$conn = $PDOConn->getConnection();
if (isset($_SESSION['loggedUser'])) {
    $usersDTO = new UsersDTO($conn);
    $res = $usersDTO->getAll();
    $loggedUser = $usersDTO->getUsersByID($_SESSION['loggedUser']);
    include('HTML/main_body.php');
} else {
    header("Location: HTML/login.php");
    exit();
}
?>

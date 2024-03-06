<?php

require_once('users.php');
require_once('database.php');
include('usersDTO.php');

$config = require_once('config.php');

use db\DB_PDO as DB;

$PDOConn = DB::getInstance($config); 
$conn = $PDOConn->getConnection();

if(isset($_POST['id'])) {
    $usersDTO = new UsersDTO($conn);
    $user = $usersDTO->getUsersByID($_POST['id']);
    // print_r($user);
    if(password_verify($_POST['pass'], $user['pass'])) {
        $user['username'] = $_POST['username'];
        $user['email'] = $_POST['email'];
        // $user['pass'] =  $_POST['pass'];
        $res = $usersDTO->updateUser($user);
        if($res) {
            header("Location: index.php");

        } else {
            echo "Errore nella modifica";
        }
    } else {
        echo "Utente non trovato";
    }
} else {
    echo "Errore";
}

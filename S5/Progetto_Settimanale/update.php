<?php

require_once('database.php');
include('usersDTO.php');
include('userClass.php');

$config = require_once('config.php');

use db\DB_PDO as DB;

$PDOConn = DB::getInstance($config); 
$conn = $PDOConn->getConnection();

if(isset($_POST['id'])) {
    $usersDTO = new UsersDTO($conn);
    print_r($_POST['id']);
    $user = $usersDTO->getUsersByID($_POST['id']);
    // print_r($user);
    if(password_verify($_POST['pass'], $user['pass'])) {
        $user = new User(
            $_POST['id'],
            $_POST['username'],
            $_POST['email'],
            $_POST['pass']
        );
        // $user['username'] = $_POST['username'];
        // $user['email'] = $_POST['email'];
        // $user['pass'] =  $_POST['pass'];
        $res = $usersDTO->updateUser($user);
        if($res) {
            header("Location: index.php");

        } else {
            echo "Errore nella modifica";
        }
    } else {
        header("Location: index.php?mod=true&id=".$_POST['id']."&error=Password errata");
    }
} else {
    echo "Errore";
}

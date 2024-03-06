<?php

    require_once('users.php');
    require_once('database.php');
    include('usersDTO.php');

    $config = require_once('config.php');

    use db\DB_PDO as DB;

    $PDOConn = DB::getInstance($config);
    $conn = $PDOConn->getConnection();

    if(isset($_POST)) {
        $usersDTO = new UsersDTO($conn);
            $user['username'] = $_POST['username'];
            $user['email'] = $_POST['email'];
            $user['pass'] = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $res = $usersDTO->addUser($user);
            if($res) {
                header("Location: index.php");

            } else {
                echo "Errore nella modifica";
            }
    } else {
        echo "Errore";
    }
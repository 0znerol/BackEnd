<?php


    require_once('Classes/database.php');
    include('Classes/usersDTO.php');
    include('Classes/userClass.php');

    $config = require_once('config.php');

    use db\DB_PDO as DB;

    $PDOConn = DB::getInstance($config);
    $conn = $PDOConn->getConnection();

    if(isset($_POST)) {
        $usersDTO = new UsersDTO($conn);
            // $user['username'] = $_POST['username'];
            // $user['email'] = $_POST['email'];
            // $user['pass'] = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $user = new User(
                null,
                $_POST['username'],
                $_POST['email'],
                password_hash($_POST['pass'], PASSWORD_DEFAULT)
            );
            print_r("ciao");

            $res = $usersDTO->addUser($user);
            if($res) {
                header("Location: login.php");

            } else {
                header("Location: login.php?error=Errore nella registrazione");
            }
    } else {
        echo "Errore";
    }
<?php
    session_start();
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    require_once('users.php');
    require_once('database.php');
    include('usersDTO.php');

    $config = require_once('config.php');

    use db\DB_PDO as DB;

    $PDOConn = DB::getInstance($config);
    $conn = $PDOConn->getConnection();

    if(isset($_GET['id'])) {
        $usersDTO = new UsersDTO($conn);
        $res = $usersDTO->deleteUser($_GET['id']);
        if($res) {

            if(isset($_SESSION['loggedUser'])) {

                if($_SESSION['loggedUser'] == $_GET['id']) {
                    session_destroy();
                    header("Location: index.php");

                }
                header("Location: index.php");

            }

        } else {
            echo "Errore nella modifica";
        }
    } else {
        echo "Errore";
    }
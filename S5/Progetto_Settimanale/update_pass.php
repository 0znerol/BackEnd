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
    $usersDTO = new UsersDTO($conn);
    if(isset($_POST['pass'])) {
        if($_POST['pass'] == $_POST['pass2']) {
            $res = $usersDTO->updatePass($_SESSION['loggedUser'], password_hash($_POST['pass'], PASSWORD_DEFAULT));
            if($res) {
                header("Location: index.php");
            } else {
                echo "Errore nella modifica";
            }
        } else {
            header("Location: /BackEnd/BackEnd/S5/Progetto_Settimanale/HTML/changePassword.php?id=".$_SESSION['loggedUser']."&error=Password non corrispondenti");
        }

    }
        
?>
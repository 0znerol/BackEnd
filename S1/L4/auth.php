<?php
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    var_dump($_POST);



    // header('Location: http://localhost:6060/BackEnd/S1/L4/index.php');
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once 'config.php';
    $mysqli = new mysqli(
        $config['host'],
        $config['username'],
        $config['password'],
        $config['database']
        );
    if($mysqli->connect_error) { die($mysqli->connect_error); } 
    # else { var_dump($mysqli);}
    $riga = [];
    $sql = "SELECT * FROM users";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if($row['password'] === $_POST['password']){
                echo '<h1>db email: </h1>'.$row['email']."<br/>";
                echo '<h1>inserted Pass: </h1>'.$_POST['password']."<br/>";

                $_SESSION['user_mail'] = $row['email'];
                $_SESSION['is_modding'] = true;
                var_dump($_SESSION);
                header('Location: http://localhost:6060/BackEnd/S1/L4/index.php');
            }
            // $row["password"] = str_repeat('*', strlen($row["password"]));
            array_push($riga, $row);
        }
    } else {
        // echo "No data found.";
    }

    $mysqli->close();
    
}
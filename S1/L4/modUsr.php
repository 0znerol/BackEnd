<?php
session_start();
var_dump($_POST);
$_SESSION['is_modding'] = true;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $_SESSION['id'] = $_POST['id'];
    $_SESSION['modMail'] = $_POST['email'];
    $_SESSION['modName'] = $_POST['name'];
    $_SESSION['modPass'] = $_POST['Pass'];



    // header('Location: http://localhost:6060/BackEnd/S1/L4/index.php');

    
}


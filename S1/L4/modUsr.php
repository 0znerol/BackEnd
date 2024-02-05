<?php
session_start();
var_dump($_POST);
$_SESSION['is_modding'] = true;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $_SESSION['id'] = $_POST['id'];
    $_SESSION['modName'] = $_POST['email'];

    header('Location: http://localhost:6060/BackEnd/S1/L4/index.php');

    
}


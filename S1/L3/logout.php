<?php
    session_start();
    unset($_SESSION['safeLogin']);
    header('Location: http://localhost:6060/BackEnd/S1/L3/index.php');
?>
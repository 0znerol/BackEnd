<?php
    session_start();
    unset($_SESSION['safeLogin']);
    header('Location: http://localhost:6060/S1L3/index.php');
?>
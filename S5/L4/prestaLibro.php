<?php   
    include 'interface.php';
    include 'classes.php';
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    session_start();
    
    $_SESSION['libro1']->prestaLibro();
    header('Location: index.php');

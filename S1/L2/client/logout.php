<?php
    session_start();
    session_destroy();
    header('Location: http://localhost:4000/index.php');
?>
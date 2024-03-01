<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    include 'head.php';
    require 'formCreator.php';
    require 'register.php';
    require_once 'config.php';
    require 'tableCreator.php';
    include 'getUsers.php';
    $form = new FormCreator('register.php', 'post');
    $form->label('username', 'Username');
        $form->input('text', 'username');
        $form->label('email', 'Email');
        $form->input('email', 'email');
        $form->label('password', 'Password');
        $form->input('password', 'password');
        $form->input('submit', 'submit', 'Register');
    echo $form->endForm();
    // session_start()
    // print_r($_SESSION['allUsers']);
    $table = new TableCreator();
    $table->addRow(['#', 'Username', 'Email']);
    foreach ($_SESSION['allUsers'] as $user) {
        $table->addRow([$user['id'], $user['username'], $user['email'], '<a href="index.php?modal=true&id='.$user['id'].'"><button id='.$user['id'].' type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">edit</button></a>']);
    }

    echo $table->endTable();
    session_destroy();
    
    include 'modal.php';
    include 'footer.php';
?>
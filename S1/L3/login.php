<?php

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
    // if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    //     echo "email non valida";
    //     return;
    // }

    // echo "<h3>"."Email: " . $_POST['email'] ."</h3>"."<h3>"."Name: " . $_POST['name'] ."</h3>". "<br>" ."<h4>". "password: " . $safePass ."</h4>";

    session_start();
        if(isset($_SESSION['loginData'])){
            foreach($_SESSION['loginData'] as $key => $accounts){
                if($accounts['email'] === $_POST['email'] && $accounts['name'] === $_POST['name'] && $accounts['password'] === $_POST['password']){

                    $passLen = strlen($accounts['password']);
                    $safePass = $accounts['password'];
                    for($i = 0; $i < $passLen; $i++){
                       $safePass[$i] = "*";
                    }
                    // echo "<h3>"."Email: " . $_POST['email'] ."</h3>"."<h3>"."Name: " . $_POST['name'] ."</h3>". "<br>" ."<h4>". "password: " . $safePass ."</h4>";
        
                    $_SESSION['safeLogin'] = [
                        
                        'name' => $accounts['name'],
                        'email' => $accounts['email'], 
                        'password' => $safePass
        
                    ];
                    
                    header('Location: http://localhost:6060/S1L3/index.php');

                    
                }
            }
        }
}

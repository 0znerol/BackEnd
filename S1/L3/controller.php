<?php


    function array_check($postD, $loginArr) {
        foreach ($loginArr as $item) {
            if ($item == $postD) {
                return true;
            }
        }
        return false;
    }
        //var_dump($_SERVER);
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
        // if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        //     echo "email non valida";
        //     return;
        // }
        $passLen = strlen($_POST['password']);
        $safePass = $_POST['password'];
        for($i = 0; $i < $passLen; $i++){
           $safePass[$i] = "*";
        }
        // echo "<h3>"."Email: " . $_POST['email'] ."</h3>"."<h3>"."Name: " . $_POST['name'] ."</h3>". "<br>" ."<h4>". "password: " . $safePass ."</h4>";
        session_start();
        $_SESSION['safeLogin'] = [
            
            'name' => $_POST['name'],
            'email' => $_POST['email'], 
            'password' => $safePass
        ];
        if (!isset($_SESSION['loginData'])) {
            $_SESSION['loginData'] = [];
            array_push($_SESSION['loginData'], [
            
                'name' => $_POST['name'],
                'email' => $_POST['email'], 
                'password' => $_POST['password']

            ]);
            echo "<h2>primo utente registrato</h2>";
        }else{
            $postData = [
                'name' => $_POST['name'],
                'email' => $_POST['email'], 
                'password' => $_POST['password']
            ];
            if (array_check($postData, $_SESSION['loginData'])) {
                echo "<h2>User already registered</h2>";
                echo '<a href="index.php">Login</a><br/>';
            } else {
                echo "<h2>User registered</h2>";
                array_push($_SESSION['loginData'], $postData);
                header('Location: http://localhost:6060/BackEnd/S1/L3/index.php');
            }

        }
        
        
    }
    // var_dump($_FILES['file']);
    if(isset($_FILES['file'])){
        // var_dump($_FILES['file']);
        $file_name = $_FILES['file']["name"];
        $file_type = $_FILES['file']["type"];
        $file_size = $_FILES['file']["size"];
        
        $target_dir = "uploads/";

        if(!empty($_FILES['file'])) {
            echo '<h3>File Name: ' . $file_name . '</h3>';
            echo '<h3>File Type: ' . $file_type . '</h3>';
            echo '<h3>File Size: ' . $file_size . '</h3>';
            if($file_type === 'image/png') {
                if($file_size < 400000) {
                    // is_uploaded_file è una funzione predefinita di PHP che controlla se un file è presente o meno
                    if(is_uploaded_file($_FILES['file']["tmp_name"]) && $_FILES['file']["error"] === UPLOAD_ERR_OK) {
                        // move_uploaded_file è una funzione predefinita di PHP che mi permette di spostare un file 
                        // caricato nella cclass='text-center'artella temporanea in una cartella definitiva
                        if(move_uploaded_file($_FILES['file']["tmp_name"], $target_dir.$file_name)) {
                            echo 'Caricamento avvenuto con successo';
                            $_SESSION['safeLogin']['img'] = $file_name;
                            // header('Location: http://localhost:6060/BackEnd/S1/L3/index.php');
                        } else {
                            echo 'Errore!!!';
                        }
                    }
                } else {
                    echo 'FileSize troppo grande';
                }
            } else {
                echo 'FileType non supportato';
            }
        }
    }

?>

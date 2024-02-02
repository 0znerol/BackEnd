<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


session_start();


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

echo $_POST['title'];
if(isset($_POST['title']) && isset($_POST['message']) ){
    // if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    //     echo "email non valida";
    //     return;
    // }
    // $passLen = strlen($_POST['password']);
    // $safePass = $_POST['password'];
    // for($i = 0; $i < $passLen; $i++){
    //    $safePass[$i] = "*";
    // }
    // echo "<h3>"."Email: " . $_POST['email'] ."</h3>"."<h3>"."Name: " . $_POST['name'] ."</h3>". "<br>" ."<h4>". "password: " . $safePass ."</h4>";

    // session_start();
    // $_SESSION['safeLogin'] = [
        
    //     'name' => $_POST['name'],
    //     'email' => $_POST['email'], 
    //     'password' => $safePass

    // ];

    echo "<h3>"."Title: " . $_POST['title'] ."</h3>"."<h3>"."Message: " . $_POST['message'] ."</h3>";
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'sandbox.smtp.mailtrap.io';                   //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username = '40e969abc17299';
    $mail->Password = '70df41277762f9';                           //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port = 2525;                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


    //Recipients
    $mail->setFrom($_SESSION['safeLogin']['email'], $_SESSION['safeLogin']['name']);
    $mail->addAddress('admin@admin.net', 'admin');     //Add a recipient
    $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $_POST['title'];
    $mail->Body    = $_POST['message'];
    $mail->AltBody = $_POST['message'];

    $mail->send();
    echo 'Message has been sent';
    header('Location: http://localhost:6060/S1L3/index.php');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}

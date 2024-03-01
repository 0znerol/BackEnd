<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
class User {
    public $name;
    public $surname;

    public function __construct($name, $surname) {
        $this->name = $name;
        $this->surname = $surname;
    }
}

$users = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $surname = $_POST['cognome'];
    $user = new User($name, $surname);
    
    session_start();

    $_SESSION['users'] = $user;

    echo "Utente registrato con successo!";
    header('Location: index.php');
}
?>


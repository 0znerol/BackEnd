<?php   
include 'interface.php';
include 'classes.php';
// include_once 'config.php';
include 'database.php';
include 'booksDTO.php';
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
session_start();

print_r($_POST);
$config = require_once('config.php');
use db\DB_PDO as DB;
$PDOConn = DB::getInstance($config);
$conn = $PDOConn->getConnection();
$booksDTO = new BooksDTO($conn);
$id = $_POST['id'];
$res = $booksDTO->getBookByID($_POST['id']);
// $libro = $res->fetch(PDO::FETCH_ASSOC);
print_r($res);

if($res) { 
    if($res['prestato'] == 0) {
        $res['prestato'] = 1;
    } else {
        $res['prestato'] = 0;
    }
    $res['id'] = $id;
    $result = $booksDTO->libroPrestato($res);
} else {
    // libro non trovato todo
}

header('Location: index.php');

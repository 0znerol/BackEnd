


<?php
// include 'interface.php';
// include 'classes.php';
// include_once 'config.php';
// include 'dbPDO.php';
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// $libro1 = new Libro('Il nome della rosa', 'Umberto Eco', 1980);
// $libro2 = new Libro('Il signore degli anelli', 'J.R.R. Tolkien', 1954);
// $libro3 = new Libro('Il piccolo principe', 'Antoine de Saint-Exupéry', 1943);

// if (isset($_POST['prestaLibro'])) {

//     $libro1->prestaLibro();
//     // print_r($_SESSION['libro1']);
//     // unset($_POST['prestaLibro']);
//     // Esegui l'azione di prestito per il libro
//     // Potresti aggiungere qui la logica per gestire il prestito del libro
// }

// if (isset($_POST['restituisciLibro'])) {JJ.R.R. Tolkien.R.R. Tolkien
//     // $_SESSION['libro1']->restituisciLibro();
//     // unset($_POST['restituisciLibro']);
//     // Esegui l'azione di restituzione per il libro
//     // Potresti aggiungere qui la logica per gestire la restituzione del libro
// }
    // PDO -> Php Data Object
    require_once('booksDTO.php');
    require_once('database.php');

    $config = require_once('config.php');

    use db\DB_PDO as DB;

    //$db = new DB($config);
    //print_r($db->conn);

    //var_dump(DB::getInstance($config));

    // Il metodo getInstance della classe Singleton ritorna una istanza
    // se è già presente altrimenti la crea e la ritorna
    $PDOConn = DB::getInstance($config); 
    $conn = $PDOConn->getConnection();


    // $id = 0;
    // $name = 'Francesca';
    // $lastname = 'Neri';
    // $city = 'Napoli';

    $booksDTO = new BooksDTO($conn);
    $res = $booksDTO->getAll();

    //$res = $userDTO->getUserByID(2);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Libreria</title>
</head>
<body>
    <h1>Libreria</h1>
    <form action="" method="post">
        <input type="submit" name="prestaLibro" value="Presta libro">
        <input type="submit" name="restituisciLibro" value="Restituisci libro">
    </form>

    <div>
        <h2>Libri disponibili</h2>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Titolo</th>
                    <th>Autore</th>
                    <th>Data di pubblicazione</th>
                    <th>Azioni</th>
                    <th>Stato</th>

                </tr>
            </thead>
            <tbody>
            <?php
                if($res) { // Controllo se ci sono dei dati nella variabile $res
                    foreach($res as $row) {
                        // print_r($row['id']."\n");
                        if($row['prestato'] == 0) {
                            $stato = 'Disponibile';
                        } else {
                            $stato = 'Prestato';
                        }
                        $id = $row['id'];
                        echo '<tr>';
                        echo '<td>'.$row['id'].'</td>';
                        echo '<td>'.$row['titolo'].'</td>';
                        echo '<td>'.$row['autore'].'</td>';
                        echo '<td>'.$row['data_pub'].'</td>';
                        echo '<td class="actions">';
                        echo '<form action="prestaLibro.php" method="post" name="form'.$id.'">';
                        echo '<input type="hidden" name="id" value="'.$id.'">';
                        echo '<input type="submit" value="Presta/Rendi">';
                        echo '</form>';
                        // echo '<button>Restituisci</button>';
                        echo '</td>';
                        echo '<td>'.$stato.'</td>';
                        echo '</tr>';
                    }
                }
            ?>
            </tbody>
        </table>
</body>
</html>


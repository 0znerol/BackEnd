<?php
include 'interface.php';
include 'classes.php';


// Creazione degli oggetti solo se non sono già presenti nella sessione
$libro1 = new Libro('Il nome della rosa', 'Umberto Eco', 1980);
$libro2 = new Libro('Il signore degli anelli', 'J.R.R. Tolkien', 1954);
$libro3 = new Libro('Il piccolo principe', 'Antoine de Saint-Exupéry', 1943);
// Creazione degli oggetti DVD
$dvd1 = new DVD('Inception', 'Christopher Nolan', 2010);
$dvd2 = new DVD('Interstellar', 'Christopher Nolan', 2014);
$dvd3 = new DVD('Dunkirk', 'Christopher Nolan', 2017);
// Gestione delle azioni
if (isset($_POST['prestaLibro'])) {

    $libro1->prestaLibro();
    // print_r($_SESSION['libro1']);
    // unset($_POST['prestaLibro']);
    // Esegui l'azione di prestito per il libro
    // Potresti aggiungere qui la logica per gestire il prestito del libro
}

if (isset($_POST['restituisciLibro'])) {
    // $_SESSION['libro1']->restituisciLibro();
    // unset($_POST['restituisciLibro']);
    // Esegui l'azione di restituzione per il libro
    // Potresti aggiungere qui la logica per gestire la restituzione del libro
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Biblioteca</h2>

    <h3>Libri</h3>
    <table>
        <tr>
            <th>Titolo</th>
            <th>Autore</th>
            <th>Anno di pubblicazione</th>
            <th>Azioni</th>
        </tr>
        <tr>
            <td><?php echo $libro1->getTitolo(); ?></td>
            <td><?php echo $libro1->getAutore(); ?></td>
            <td><?php echo $libro1->getAnnoPubblicazione(); ?></td>
            <td>
                <form method="post">
                    <button type="submit" name="prestaLibro1">Presta</button>
                    <button type="submit" name="restituisciLibro1">Restituisci</button>
                </form>
                <?php
                    if (isset($_POST['prestaLibro1'])) {
                        $libro1->prestaLibro();
                        // echo "Prestato";
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $libro2->getTitolo(); ?></td>
            <td><?php echo $libro2->getAutore(); ?></td>
            <td><?php echo $libro2->getAnnoPubblicazione(); ?></td>
            <td>
                <form method="post">
                    <button type="submit" name="prestaLibro2">Presta</button>
                    <button type="submit" name="restituisciLibro2">Restituisci</button>
                </form>
                <?php
                    if (isset($_POST['prestaLibro2'])) {
                        $libro2->prestaLibro();
                        // echo "Prestato";
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $libro3->getTitolo(); ?></td>
            <td><?php echo $libro3->getAutore(); ?></td>
            <td><?php echo $libro3->getAnnoPubblicazione(); ?></td>
            <td>
                <form method="post">
                    <button type="submit" name="prestaLibro3">Presta</button>
                    <button type="submit" name="restituisciLibro3">Restituisci</button>
                </form>
                <?php
                    if (isset($_POST['prestaLibro3'])) {
                        $libro3->prestaLibro();

                    }
                ?>
            </td>
        </tr>
    </table>

    <!-- <h3>Azioni</h3>
    <form method="post">
        <button type="submit" name="prestaLibro">Presta Libro</button>
        <button type="submit" name="restituisciLibro">Restituisci Libro</button>
    </form> -->
    <p>Numero totale di libri: <?php echo Libro::contaLibri(); ?></p>                
    <p>Numero totale di DVD: <?php echo DVD::contaDVD(); ?></p>
    <!-- Ripeti lo stesso schema per i DVD se necessario -->
</body>
</html>

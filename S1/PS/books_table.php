<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once 'config.php';
    $mysqli = new mysqli(
        $config['host'],
        $config['username'],
        $config['password'],
        $config['database']
        );
if($mysqli->connect_error) { die($mysqli->connect_error); } 
# else { var_dump($mysqli);}
    $riga = [];
    $sql = "SELECT * FROM books";
    $result = $mysqli->query($sql);

        while ($row = $result->fetch_assoc()) {
            var_dump($row);
            // $row["password"] = str_repeat('*', strlen($row["password"]));
            array_push($riga, $row);

            ?>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Handle</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td colspan="2">Larry the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
            <?php
        }


    $mysqli->close();

?>

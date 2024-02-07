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
if ($mysqli->connect_error) {
  die($mysqli->connect_error);
} else {
  // var_dump($mysqli);
}
$riga = [];
$sql = "SELECT * FROM books WHERE genere = 'Fantasy'";
$result = $mysqli->query($sql);
?>
<div class="row align-content-around p-0">
  <div class="col ps-4">
    <table class="table">
      <h3>Fantasy</h3>

      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Author</th>
          <th scope="col">Realese</th>
          <th scope="col">Del</th>
          <th scope="col" class="text-center">Mod</th>


        </tr>
      </thead>
      <tbody>

        <?php
        while ($row = $result->fetch_assoc()) {
          // var_dump($row);
          // $row["password"] = str_repeat('*', strlen($row["password"]));
          array_push($riga, $row);
          // var_dump($riga)
        
          ?>

          <tr>
            <th scope="row">
              <?php echo $row["id"] ?>
            </th>
            <td>
              <a href=<?php echo "http://localhost:6060/BackEnd/S1/PS/" . $row['book_dir'] ?>><?php echo $row["titolo"] ?></a>
            </td>
            <td>
              <?php echo $row["autore"] ?>
            </td>
            <td>
              <?php echo $row["anno_pubblicazione"] ?>
            </td>
            <td>
              <form action="delete_book.php">
                <input type="hidden" name="id" value=<?php echo $row['id'] ?>>
                <button type="submit" class='btn btn-danger'></button>
              </form>
            </td>
            <td class="text-center">
              <form action="mod_book_form.php" method="POST">
                <input type="hidden" name="title" value=<?php echo $row['titolo'] ?>>
                <input type="hidden" name="author" value=<?php echo $row['autore'] ?>>
                <input type="hidden" name="relese" value=<?php echo $row['anno_pubblicazione'] ?>>
                <input type="hidden" name="genere" value=<?php echo $row['genere'] ?>>
                <input type="hidden" name="id" value=<?php echo $row['id'] ?>>
                <button type="submit" class='btn btn-warning'></button>
              </form>
            </td>

          </tr>


          <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <?php
  $sql = "SELECT * FROM books WHERE genere = 'horror'";
  $result = $mysqli->query($sql);
  ?>
  <div class="col p-0">
    <table class="table">
      <h3>Horror</h3>
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Author</th>
          <th scope="col">Realese</th>
          <th scope="col">Del</th>
          <th scope="col" class="text-center">Mod</th>

        </tr>
      </thead>
      <tbody>

        <?php
        while ($row = $result->fetch_assoc()) {
          #var_dump($row);
          // $row["password"] = str_repeat('*', strlen($row["password"]));
          array_push($riga, $row);
          // var_dump($riga)
        
          ?>

          <tr>
            <th scope="row">
              <?php echo $row["id"] ?>
            </th>
            <td>
              <a href=<?php echo "http://localhost:6060/BackEnd/S1/PS/" . $row['book_dir'] ?>><?php echo $row["titolo"] ?></a>
            </td>
            <td>
              <?php echo $row["autore"] ?>
            </td>
            <td>
              <?php echo $row["anno_pubblicazione"] ?>
            </td>
            <td>
              <form action="delete_book.php" method="GET">
                <input type="hidden" name="id" value=<?php echo $row['id'] ?>>
                <button type="submit" class='btn btn-danger'></button>
              </form>
            </td>
            <td class="text-center">
              <form action="mod_book_form.php" method="POST">
                <input type="hidden" name="title" value=<?php echo $row['titolo'] ?>>
                <input type="hidden" name="author" value=<?php echo $row['autore'] ?>>
                <input type="hidden" name="relese" value=<?php echo $row['anno_pubblicazione'] ?>>
                <input type="hidden" name="genere" value=<?php echo $row['genere'] ?>>
                <input type="hidden" name="id" value=<?php echo $row['id'] ?>>
                <button type="submit" class='btn btn-warning'></button>
              </form>
            </td>
          </tr>


          <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <?php
  ?>
</div>

<?php
$sql = "SELECT * FROM books WHERE genere = 'sci-fi'";
$result = $mysqli->query($sql);
?>
<div class="row p-0">
  <div class="col ps-4">
    <table class="table">
      <h3>Sci-fi</h3>

      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Author</th>
          <th scope="col">Realese</th>
          <th scope="col">Del</th>
          <th scope="col" class="text-center">Mod</th>


        </tr>
      </thead>
      <tbody>

        <?php
        while ($row = $result->fetch_assoc()) {
          #var_dump($row);
          // $row["password"] = str_repeat('*', strlen($row["password"]));
          array_push($riga, $row);
          // var_dump($riga)
        
          ?>

          <tr>
            <th scope="row">
              <?php echo $row["id"] ?>
            </th>
            <td>
              <a href=<?php echo "http://localhost:6060/BackEnd/S1/PS/" . $row['book_dir'] ?>><?php echo $row["titolo"] ?></a>
            </td>
            <td>
              <?php echo $row["autore"] ?>
            </td>
            <td>
              <?php echo $row["anno_pubblicazione"] ?>
            </td>
            <td>
              <form action="delete_book.php">
                <input type="hidden" name="id" value=<?php echo $row['id'] ?>>
                <button type="submit" class='btn btn-danger'></button>
              </form>
            </td>
            <td class="text-center">
              <form action="mod_book_form.php" method="POST">
                <input type="hidden" name="title" value=<?php echo $row['titolo'] ?>>
                <input type="hidden" name="author" value=<?php echo $row['autore'] ?>>
                <input type="hidden" name="relese" value=<?php echo $row['anno_pubblicazione'] ?>>
                <input type="hidden" name="genere" value=<?php echo $row['genere'] ?>>
                <input type="hidden" name="id" value=<?php echo $row['id'] ?>>
                <button type="submit" class='btn btn-warning'></button>
              </form>
            </td>
          </tr>


          <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <?php
  $sql = "SELECT * FROM books WHERE genere = 'other'";
  $result = $mysqli->query($sql);
  ?>
  <div class="col p-0">
    <table class="table">
      <h3>Other</h3>
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Author</th>
          <th scope="col">Realese</th>
          <th scope="col">Del</th>
          <th scope="col" class="text-center">Mod</th>

        </tr>
      </thead>
      <tbody>

        <?php
        while ($row = $result->fetch_assoc()) {
          #var_dump($row);
          // $row["password"] = str_repeat('*', strlen($row["password"]));
          array_push($riga, $row);
          // var_dump($riga)
        
          ?>

          <tr>
            <th scope="row">
              <?php echo $row["id"] ?>
            </th>
            <td>
              <a href=<?php echo "http://localhost:6060/BackEnd/S1/PS/" . $row['book_dir'] ?>><?php echo $row["titolo"] ?></a>
            </td>
            <td>
              <?php echo $row["autore"] ?>
            </td>
            <td>
              <?php echo $row["anno_pubblicazione"] ?>
            </td>
            <td>
              <form action="delete_book.php">
                <input type="hidden" name="id" value=<?php echo $row['id'] ?>>
                <button type="submit" class='btn btn-danger'></button>
              </form>
            </td>
            <td class="text-center">
              <form action="mod_book_form.php" method="POST">
                <input type="hidden" name="title" value=<?php echo $row['titolo'] ?>>
                <input type="hidden" name="author" value=<?php echo $row['autore'] ?>>
                <input type="hidden" name="relese" value=<?php echo $row['anno_pubblicazione'] ?>>
                <input type="hidden" name="genere" value=<?php echo $row['genere'] ?>>
                <input type="hidden" name="id" value=<?php echo $row['id'] ?>>
                <button type="submit" class='btn btn-warning'></button>
              </form>
            </td>
          </tr>


          <?php
        }
        ?>
      </tbody>
    </table>
  </div>


  <?php
  ?>
</div>

<?php

$mysqli->close();

?>
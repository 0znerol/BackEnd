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
    $sql = "SELECT * FROM users";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $row["password"] = str_repeat('*', strlen($row["password"]));
            array_push($riga, $row);
        }
    } else {
        // echo "No data found.";
    }

    $mysqli->close();

?>

<h3 class='text-center'>User List</h3>
<table class="table text-center mt-5 w-75 m-auto" data-bs-theme="dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Delete</th>
      <th scope="col">Modify</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach ($riga as $row) { ?>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $row["name"] ?></td>
      <td><?php echo $row["email"] ?></td>
      <td><?php echo $row["password"] ?></td>
      <td>
        <form action="deleteUsr.php" method="get">
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <input type="submit" class="bg-danger border-0 rounded w-100" value="">
        </form>  
      </td>
      <td>
        <form action="modUsr.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
            <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
            <input type="hidden" name="password" value="<?php echo $row['password']; ?>">
            <input type="submit" class="bg-warning border-0 rounded w-100" value="">
        </form>
      </td>

    </tr>
    <?php } ?>
  </tbody>
</table>
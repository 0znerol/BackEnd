<?php

require_once 'config.php';
$is_modding = false;
$mysqli = new mysqli(
    $config['host'],
    $config['username'],
    $config['password'],
    $config['database']
);
var_dump($_GET);
if($mysqli->connect_error) { die($mysqli->connect_error); }
var_dump($_GET);
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

?>
<h3 class='text-center'>Mod User</h3>
<form action="addUser.php" method="POST" class="w-75 m-auto">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="name">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" value="Submit" class="btn btn-success">Submit</button>
</form>
<?php
    function update() {
        // Your code here
    }
    // Perform the database insert operation
    $query = "UPDATE users SET name = ? WHERE id = '$_GET[id]'";
    $result = $mysqli->query($query);

    if ($result) {
        echo "User updated successfully!";
        // header('Location: http://localhost:6060/BackEnd/S1/L4/index.php');

    } else {
        echo "Error adding user: " . $mysqli->error;
    }
}
?>
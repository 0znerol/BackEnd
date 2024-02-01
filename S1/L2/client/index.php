<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Document</title>
  </head>
  <body class='row'>
    <form class='row w-75 m-auto' action="controller.php" method="POST">
      <label for="name">Name:</label><br>
      <input type="text" id="name" name="name"><br>
      <label for="email">Email:</label><br>
      <input type="text" id="email" name="email"><br>
      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password"></input><br>
      <input type="submit" value="Submit">
    </form>

    <div class="row mt-5">
        <?php
          session_start();
          if($_SESSION){
            echo '<h1>logged as</h1>';
            echo "<h3>"."Email: " . $_SESSION['email'] ."</h3>"."<h3>"."Name: " . $_SESSION['name'] ."</h3>". "<br>" ."<h4>". "password: " . $_SESSION['password'] ."</h4>";
          }
        ?>
  
  </body>
</html>

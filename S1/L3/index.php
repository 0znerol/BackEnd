<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Document</title>
  </head>
  <body class='row'>


    <div class="row mt-5">
      
      <?php
        session_start();
          var_dump($_SESSION['loginData']);
        if(isset($_SESSION['safeLogin'])){?>
          <div>
            <h1>logged as</h1>
            <?php 
              echo "<div class='w-25' ><img class='w-25' src='uploads/".$_SESSION['safeLogin']['img']."' alt=''></div>";
              echo "<h3>"."Email: " . $_SESSION['safeLogin']['email'] ."</h3>"."<h3>"."Name: " . $_SESSION['safeLogin']['name'] ."</h3>". "<br>" ."<h4>". "password: " . $_SESSION['safeLogin']['password'] ."</h4>";
              echo $_SESSION['loginData']
            ?>
            <form action="logout.php" method="POST">
              <input type="submit" value="logout">
            </form>
          </div>
          <div>
            <h1 class='text-center'>Send Mail</h1>
            <form class='row w-75 m-auto' action="send_mail.php" method="POST" enctype="multipart/form-data">
              <label for="title">Title:</label>
              <input type="text" id="title" name="title">
              <label for="message">Message:</label>
              <input type="text" id="message" name="message"></input>
              <input type="file" name="file" id="file">
              <input class="w-25 mt-2" type="submit" value="Submit"></input>
            </form>
          </div>
        <?php }else{ ?>
        <div>
          
            <h1 class='text-center'>Register</h1>
            <form class='row w-75 m-auto' action="controller.php" method="POST" enctype="multipart/form-data">
              <label for="email">Email:</label>
              <input type="text" id="email" name="email">
              <label for="name">Name:</label>
              <input type="text" id="name" name="name">
              <label for="password">Password:</label>
              <input type="password" id="password" name="password"></input>
              <input type="file" name="file" id="file">
              <input class="w-25 mt-2" type="submit" value="Submit"></input>
            </form>

            <h1 class='text-center'>login</h1>
            <form class='row w-75 m-auto' action="login.php" method="POST" enctype="multipart/form-data">
              <label for="email">Email:</label>
              <input type="text" id="email" name="email">
              <label for="name">Name:</label>
              <input type="text" id="name" name="name">
              <label for="password">Password:</label>
              <input type="password" id="password" name="password"></input>
              <input type="file" name="file" id="file">
              <input class="w-25 mt-2" type="submit" value="Submit"></input>
            </form>
          
        </div>
      <?php } ?>

    </div>



  </body>
</html>

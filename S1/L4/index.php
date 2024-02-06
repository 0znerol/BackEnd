<?php
session_start();

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sql-php</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body data-bs-theme="dark" class='h-100 bg-dark-subtle mt-5'>
        <div class="row m-auto align-items-center">
             <?php ?>

             <?php 

                  if($_SESSION['is_modding']){?>
                        <div class="row">
                             <div class="text-center">
                             <h3>Mod <?php echo $_SESSION['modMail'] ?></h3>
                             </div>
        
                             <form action="modDb.php" method="POST" class="w-75 m-auto border rounded p-2">

                                     <div class="mb-3">
                                             <label for="name" class="form-label">Name</label>
                                             <input type="text" value="<?php echo $_SESSION['modName'] ?>"  class="form-control" id="name" name="name" aria-describedby="name">
                                     </div>
                                     <div class="mb-3">
                                             <label for="email" class="form-label">Email address</label>
                                             <input type="email" value="<?php echo $_SESSION['modMail'] ?>" class="form-control" id="email" name="email" aria-describedby="email">
                                     </div>
                                     <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                                     <div class="row justify-content-center">
                                     <button type="submit" value="Submit" class="btn btn-warning w-50">Submit & exit</button>
                                     </div>

                             </form>
                        </div>
                    <?php require_once "createPostForm.php"; ?>
                  <?php } else {require_once "userList.php"; require_once "addUserForm.php";} 
                        require "postList.php";

                     ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>

<?php
session_start();
var_dump($_POST);
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $_SESSION['id'] = $_POST['id'];
    $_SESSION['modMail'] = $_POST['email'];
    $_SESSION['modName'] = $_POST['name'];



    // header('Location: http://localhost:6060/BackEnd/S1/L4/index.php');

    
}
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
 </body>
</html>
    <form action="auth.php" method="POST" class="w-75 m-auto">
            <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" value="" class="form-control" id="password" name="password" aria-describedby="password">
            </div>
            <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
            <button type="submit" value="Submit" class="btn btn-success">Submit</button>
    </form>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sql-php</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body data-bs-theme="dark" class='h-100 bg-dark-subtle mt-5'>
 </body>
</html>
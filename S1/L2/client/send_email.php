<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        var_dump($_SERVER);
        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])){
            echo "<h3>"."Email: " . $_POST['email'] ."</h3>". "<br>" ."<h4>". "Message: " . $_POST['message']."</h4>";
        }
    ?>
</body>
</html>
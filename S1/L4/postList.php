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
    $sql = "SELECT * FROM posts";

    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        ?>
        <h3 class='text-center'>Posts</h3>
        <div class="row m-auto mt-2" >
        <?php
        while ($row = $result->fetch_assoc()) {
            array_push($riga, $row);
            ?>  
            <div class="card my-2">
                <div>
                    <h6 class="text-end"><?php echo $row["user"] ?></h6>
                </div>

                <div class="card-header">
                    <h5><?php echo $row["title"] ?></h5>
                </div>
                <div class="card-body">
            
                    <p><?php echo $row["body"] ?></p>
            
                </div>
            </div>
            
            
            <?php
        }
        ?></div><?php
    } else {
        // echo "No data found.";
    }

    $mysqli->close();

?>
<?php
session_start();
$_SESSION["is_modding"] = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    ?>
    <form action="mod_book_form.php" method="POST" id="mod-post">
        <input type="hidden" name="title" value=<?php echo $_POST['title'] ?>>
        <input type="hidden" name="author" value=<?php echo $_POST['author'] ?>>
        <input type="hidden" name="relese" value=<?php echo $_POST['relese'] ?>>
        <input type="hidden" name="genere" value=<?php echo $_POST['genere'] ?>>
        <input type="hidden" name="id" value=<?php echo $_POST['id'] ?>>
    </form>




    <script type="text/javascript">
        document.getElementById('mod-post').submit(); // SUBMIT FORM
    </script>


<?php }
session_write_close();

exit();
?>
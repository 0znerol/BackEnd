<?php
$user = $usersDTO->getUsersByID($_GET['id']);
?>
<!-- Display form for modification -->
<div class="card m-5 bg-dark border-dark-subtle">
    <div class="d-inline-flex">
        <h2 class="m-auto text-light">Modifica Utente "<?php echo $user['username']; ?>" </h2>
        <a href="index.php" class="text-danger pt-2 pe-2"><i class="bi bi-x-lg border rounded border-danger"></i></a>
    </div>
<form action="HTML/../update.php" method="post" class="m-2">
    <input class="form-control" type="hidden" name="id" value="<?php echo $user['id']; ?>">
    <label class="form-label" for="username">Username</label>
    <input class="form-control" type="text" name="username" value="<?php echo $user['username']; ?>" required><br>
    <label class="form-label" for="email">Email</label>
    <input class="form-control" type="email" name="email" value="<?php echo $user['email']; ?>" required><br>
    <label class="form-label" for="password">Password</label>
    <input class="form-control" type="password" name="pass" value="" placeholder="Verifica Password" required><br>
    <button type="submit" class="btn border border-success text-success">Accetta</button>
    

</form>
<a href="/BackEnd/BackEnd/S5/Progetto_Settimanale/HTML/changePassword.php?id=<?php echo $user['id'] ?>" class="m-2"><button class="btn border border-warning text-warning">Password Dimenticata</button></a>
<?php if(isset($_GET['error'])) { ?>
    <p class="m-auto bg-danger text-white rounded p-2"> <?php echo $_GET['error']; ?> </p>
<?php } ?>
</div>
</body>
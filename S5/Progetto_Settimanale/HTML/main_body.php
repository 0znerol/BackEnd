<body class="bg-dark">
    <div class='d-flex justify-content-between'>
        <h1 class="text-white">Benvenuto <?php echo $loggedUser['username'] ?></h1>
        <a href="logout.php" class="m-2"><button class="btn border border-danger text-danger bg-dark p-1 px-4"><i class="bi bi-box-arrow-left me-1"></i></button></a>
    </div>
    <h2 class="text-white">User List</h2>
    <table class="table table-dark table-striped">
        <thead>
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Modifica</th>
                <th scope="col">Elimina</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($res as $user) { ?>
                <tr class="text-center">
                    <td><p class="mt-3"><?php echo $user['id']; ?></p></td>
                    <td><p class="mt-3"><?php echo $user['username']; ?></p></td>
                    <td><p class="mt-3"><?php echo $user['email']; ?></p></td>
                    <td><p class="mt-3"><?php echo str_repeat('*', strlen($user['pass'])/6); ?></p></td>
                    <?php if($loggedUser['username'] == 'admin' || $user['id'] == $_SESSION['loggedUser']) { ?>
                        <td><a href="index.php?mod=true&id=<?php echo $user['id']; ?>"><button class="btn border border-warning text-warning mt-3"><i class="bi bi-pencil-fill"></i></button></a></td>
                        <td><a href="delete.php?id=<?php echo $user['id']; ?>"><button class="btn border border-danger text-danger mt-3"><i class="bi bi-trash-fill"></i></button></a></td>
                    <?php } else { ?>
                        <td></td>
                        <td></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php if(isset($_GET['mod']) && $_GET['mod'] == true) {
        include('modForm.php');
    } ?>
    </body>
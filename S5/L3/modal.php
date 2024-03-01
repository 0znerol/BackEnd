


<?php
  if (isset($_GET['modal'])) {

    ?>
    <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                <?php
    foreach ($_SESSION['allUsers'] as $user) {
        // print_r($_GET);

        if ($user['id'] == $_GET['id']) {

          $modalForm = new FormCreator('mod.php', 'post');
          $modalForm->label('username', 'Username');
          $modalForm->input('text', 'username', $user['username']);
          $modalForm->label('email', 'Email');
          $modalForm->input('email', 'email', $user['email']);
          $modalForm->label('password', 'Password');
          $modalForm->input('password', 'password');
          $modalForm->input('submit', 'submit', 'Save changes');
          echo $modalForm->endForm();
        }
      }
                ?>
            </div>
      <div class="modal-footer">
      <a href="index.php" > <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> </a>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
    <?php
  }
?>



<!-- Modal -->

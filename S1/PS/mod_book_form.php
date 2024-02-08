<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


  ?>

  <!doctype html>
  <html lang="en">


  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Progetto-Settimanale-BE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>

  <body data-bs-theme="dark" class='bg-dark-subtle'>
    <div>
      <form action='mod_book.php' method="POST">
        <fieldset>
          <legend>Mod
            <?php echo $_POST['title'] ?>
            n
            <?php echo $_POST['id'] ?>
          </legend>
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" value=<?php echo $_POST['title'] ?>>
          </div>
          <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" id="author" name="author" class="form-control" value=<?php echo $_POST['author'] ?>>
          </div>
          <div class="mb-3">
            <label for="relese" class="form-label">Relese</label>
            <input type="text" id="relese" class="form-control" value=<?php echo $_POST['relese'] ?> name='relese'>
          </div>
          <div class="mb-3">
            <label for="select" class="form-label">Disabled select menu</label>
            <select id="select" name="genere" class="form-select">
              <option>Fantasy</option>
              <option>Horror</option>
              <option>Sci-fi</option>
              <option>Other</option>
            </select>
          </div>
          <input type="hidden" name="id" value=<?php echo $_POST['id'] ?>>
          <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>
  </body>

  </html>
  <?php
}
?>
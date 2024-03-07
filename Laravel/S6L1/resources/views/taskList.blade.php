<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task List</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2>Task List</h2>
    <table class="table table-striped border rounded">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Task</th>
          <th scope="col">Description</th>
          <th scope="col">Status</th>
          <th scope="col">Aggiorna</th>
          <th scope="col">Elimina</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td><a href="{{ route('singleTask', ['id' => 1, 'status' => 2]) }}">Task 1</a></td>
          <td>Complete the project</td>
          <td>Completed</td>
          <td><a href="{{ route('update', ['id' => 1]) }}">Aggiorna</a></td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td><a href="{{ route('singleTask', ['id' => 2, 'status' => 1]) }}">Task 2</a></td>
          <td>Write documentation</td>
          <td>In Progress</td>
          <td><a href="{{ route('update', ['id' => 2]) }}">Aggiorna</a></td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td><a href="{{ route('singleTask', ['id' => 3, 'status' => 0]) }}">Task 3</a></td>
          <td>Test functionality</td>
          <td>Not Started</td>
          <td><a href="{{ route('update', ['id' => 3]) }}">Aggiorna</a></td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap JS (optional) -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

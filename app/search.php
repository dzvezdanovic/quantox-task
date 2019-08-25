<?php
require "db.php";

session_start();

if(empty($_SESSION['login'])){
    $_SESSION['msg'] = 'Please login';
    header("Location: login.php");
} else {
  $param = "%{$_POST['search-param']}%";

  $sql = "SELECT * FROM user WHERE email LIKE ? OR name LIKE ?";
  $stmt = $conn->prepare($sql);

  $stmt->bind_param('ss', $param, $param);
  $stmt->execute();

  $result = $stmt->get_result();
  $users = [];
  if($result->num_rows === 0) {
    $_SESSION['search-error'] = 'User not found.';
  } else {
    while($row = $result->fetch_assoc()) {
      $users[] = [
        'id' => $row['id'],
        'name' => $row['name'],
        'email' => $row['email']
      ];
    }
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"/>
  <title>Quantox Task</title>
  <link
      href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600"
      rel="stylesheet"
      type="text/css"
  />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../index.php">Quantox Task</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../index.php">Back</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
<div class="row">
  <table class="table table-bordered">
    <thead>
    <tr>
      <th>Id</th>
      <th>Username</th>
      <th>Email</th>
    </tr>
    </thead>
    <tbody>
    <?php if(empty($users)): ?>
    <h1><?= $_SESSION['search-error'] ?></h1>
    <?php $_SESSION['search-error'] = null; endif; ?>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $user['email'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
</div>
</body>
</html>


<?php
require "db.php";
session_start();


 function getByEmail($email, $conn) {
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param('s', $email);
    $stmt->execute();

    $result = $stmt->get_result();
    if($result->num_rows === 0){
        return null;
    } 
    $row = $result->fetch_assoc();
    $user = ['id' => $row['id'], 'name' => $row['name'], 'email' => $row['email'], 'password' => $row['password']];
    return $user;
}


if(!empty($_POST['email'])) {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $user = getByEmail($email, $conn);

    if (password_verify($password, $user['password'])) {
        $_SESSION['login'] = 'active';
        $_SESSION['username'] = $user['name'];
        echo "Successful login";
        header("Location: ../index.php");
    } else {
        echo 'Unsuccessful login';
        $_SESSION['msg'] = 'User does not exist. Please try again';
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
<main>
  <div class="container">
  <?php if(!empty($_SESSION['msg'])) { ?>
  <h1><?php echo $_SESSION['msg'] ?></h1>
  <?php $_SESSION['msg'] = null; } ?>
  <h1>Login</h1>
    <div id="login">
      <form action="login.php" method="post" id="signup-form">
        <div class="form-group">
        <div>
          <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required autocomplete="off"/>
          </div>
        </div>   
        <div>
          <label for="password">Password</label>
          <input
              type="password"
              id="password"
              name="password"
              class="form-control"
              required
              autocomplete="off"
          />
        </div>
        </div>
        <button type="submit" class="btn btn-primary">
          Login
        </button>
      </form>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


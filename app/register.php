<?php

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
  <h1>Register</h1>
    <div id="register">
      <form action="register.php" method="post" id="signup-form">
        <div class="form-group">
        <div>
          <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required autocomplete="off"/>
          </div>

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
        <div>
          <label for="repeat_password">Repeat Password</label>
          <input
              type="password"
              id="repeat_password"
              name="repeat_password"
              class="form-control"
              required
              autocomplete="off"
          />
        </div>
        </div>
         <button type="submit" class="btn btn-primary">
          Register
        </button>
      </form>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

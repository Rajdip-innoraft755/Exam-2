<?php
  // reuire the file needs to validate the user credentials.
  require "login-action.php";
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <?php
      if(isset($error)) {
        echo $error;
      }
    ?>
    <form action="/login.php" method="POST">
      <label for="">USER ID</label>
      <input type="text" name="userId" id="" required>

      <label for="">PASSWORD</label>
      <input type="password" name="password" id="" required>

      <input type="submit" value="LOGIN" name="login">
    </form>
  </div>
</body>
</html>

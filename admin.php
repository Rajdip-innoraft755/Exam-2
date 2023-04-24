<?php

  // This is to uses the classes written inside /classes folder
  require "./vendor/autoload.php";

  //session starts and checks whether user successfully logged in or not.
  session_start();
  if(!$_SESSION["active"]) {
    header("location:login.php");
  }

  // Initialize the Player class object
  $obj = new Player();

  // Fetch the player data user are printed in tabular form.
  $data = $obj->fetch();
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/index.css">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <div class="navbar">
      <div class="login">
        <ul>
          <li>
            <a href="/logout.php">LOGOUT</a>
          </li>
        </ul>
      </div>
    </div>

    <div class="update">
      <div class="error">
        <?php
          session_start();
          if(isset($_SESSION["countExceed"])) {
            echo $_SESSION["countExceed"];
            unset($_SESSION["countExceed"]);
          }
        ?>
      </div>
      <form action="/addplayer.php" method="POST">
        <label for="">Player Name:</label>
        <input type="text" name="name" id="" required>

        <label for="">Run :</label>
        <input type="number" name="run" id="" required>

        <label for="">No. of ball faced:</label>
        <input type="number" name="ball" id="" required>

        <input type="submit" name="add" value="add player">
      </form>
    </div>

    <div class="player-table">
      <table>
        <thead>
          <tr>
            <td>Player Name</td>
            <td>Run Scored</td>
            <td>No. of Balls Played</td>
            <td>Strike Rate</td>
          </tr>
        </thead>
        <tbody>
          <?php
            for($i = 0; $i < count($data); $i++) {?>
          <tr>
            <td> <input type="text" class="name"
                id="<?php echo "name" . $data[$i]['id'] ?>"
                value="<?php echo $data[$i]["name"] ?>">
            </td>
            <td><input type="number" class="run" id="<?php echo "run". $data[$i]['id'] ?>"
                value="<?php echo $data[$i]["run"]?>">
            </td>
            <td> <input type="number" class="balls" id="<?php echo "balls" . $data[$i]['id'] ?>"
                value="<?php echo $data[$i]["balls"]?>">
            </td>
            <td><?php echo $data[$i]["strikeRate"]?></td>
            <td>
              <button class="delete" id="<?php echo $data[$i]['id']?>">Delete
              </button>
            </td>
            <td>
              <button class="edit" id="<?php echo $data[$i]['id'] ?>">Modify
              </button>
            </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

  </div>
</body>
<script src="/js/jquery.min.js"></script>
<script src="/js/index.js"></script>
</html>

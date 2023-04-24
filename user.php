<?php

// This is to uses the classes written inside /classes folder
require "./vendor/autoload.php";

// Initialize the Player class object
$obj = new Player();

// Fetch the player data user are printed in tabular form.
$data = $obj->fetch();

// Fetch the man of the match which is printed later.
$manOfmatch = $obj->manOfMatch();
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
          for ($i = 0; $i < count($data); $i++) { ?>
            <tr>
              <td>
                <?php echo $data[$i]["name"] ?>
              </td>
              <td>
                <?php echo $data[$i]["run"] ?>
              </td>
              <td>
                <?php echo $data[$i]["balls"] ?>
              </td>
              <td>
                <?php echo $data[$i]["strikeRate"] ?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <div class="higest">
      <button id="show">Man of The Match</button>
      <h2 class="man">MAN OF THE MATCH : <?php echo $manOfmatch?></h2>
    </div>
  </div>
</body>
<script src="/js/jquery.min.js"></script>
<script src="/js/index.js"></script>
</html>

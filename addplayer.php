<?php

// This is to uses the classes written inside /classes folder
require "./vendor/autoload.php";

// If the request method is post and the add button is clicked the user
// then it creats a object of the Player class and add the player.
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
  $obj = new Player();

  // This called function returns false when the player count already 11.
  if (!$obj->addPlayer($_POST["name"], $_POST["run"], $_POST["ball"])) {
   session_start();
    $_SESSION["countExceed"] = "You can add only 11 players.";
  }
  header("location:admin.php");
}
?>

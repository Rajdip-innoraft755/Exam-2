<?php

// This is to uses the classes written inside /classes folder
require "./vendor/autoload.php";

// If the request method is post then it creats a object of the Player class
// and edit the player based on ajax call.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $obj = new Player();
  $obj->editPlayer($_POST["id"], $_POST["name"], $_POST["run"], $_POST["balls"]);
}
?>


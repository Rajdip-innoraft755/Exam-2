<?php
  // This is to uses the classes written inside /classes folder
  require "./vendor/autoload.php";

  // If the request method is post then it creats a object of the Login class
  // based on validation it redirects either to admin dashboard page or the
  // login page with proper error message.
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $obj = new Login();
    if (!$obj->validate($_POST["userId"], $_POST["password"])) {
      $error = "Invalid Credentials.";
    }
    else {
      header("location:admin.php");
    }
  }
?>

<?php
  // This is to destroy the session at the time of admin login and sends user
  // to the index page.
  session_start();
  session_unset();
  session_destroy();
  header("location:index.php");
?>

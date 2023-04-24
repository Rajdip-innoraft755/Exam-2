<?php

// This is to uses the classes written inside /classes folder
require "./vendor/autoload.php";

/**
 * Login class is to fetch the user details based on the credentials given
 * as input by the user at the time of login.
 *
 *   @author rajdip <rajdip.roy@innoraft.com>
 */
class Login extends ConnectDB
{

  /**
   * This function is to validate the data which are given as input by user, if
   * user exists then store that user id in session variable, otherwise
   * redirects to the login page with proper error message.
   *
   *   @param string $userId
   *     This accepts user id as the argument.
   *
   *   @param string $password
   *     This accepts password as the argument.
   *
   *   @return bool
   *     This returns boolean based on validation of user credentials.
   */
  public function validate(string $userId, string $password): bool
  {
    $sql = "select * from user where binary userId='$userId' and password='$password'";
    $result = $this->conn->query($sql);
    if ($result->num_rows == 1) {
      session_start();
      $_SESSION["active"] = TRUE;
      $_SESSION["userId"] = $userId;
      return TRUE;
    }
    return FALSE;
  }
}
?>


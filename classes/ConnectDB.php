<?php

// This is to uses the classes written inside /classes folder
require("./Config/config.php");

/**
 * ConnetDB class is to connect the database and manage the database operations.
 *
 *   @author rajdip <rajdip.roy@innoraft.com>
 */
class ConnectDB {

  /**
   * This is to store a mysqli variable to maintain the connection with
   * database.
   *
   *   @var object
   */
  public $conn;

  /**
   * This constructor is to initialize the object of the mysqli class.
   *
   *   @return void
   *     Constructor returns nothing.
   */
  public function __construct()
  {
    $this->conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
  }
}
?>

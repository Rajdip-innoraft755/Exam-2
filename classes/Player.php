<?php

// This is to uses the classes written inside /classes folder
require "./vendor/autoload.php";

/**
 * Player class is to manage all the operations related to player table
 * Main use of this class is to add, delete, fetch, edit player details.
 *
 *   @author rajdip <rajdip.roy@innoraft.com>
 */
class Player extends ConnectDB
{

  /**
   * This function is to add new player and store their details in database.
   *
   *   @param  string $name
   *     Takes the new player name as argument.
   *
   *   @param  int $run
   *     Takes the run scored by the player as argument.
   *
   *   @param  int $balls
   *     Takes the balls faced by the player as argument.
   *
   *   @return bool
   *     This function returns boolean based on insert query status.
   */
  public function addPlayer(string $name, int $run, int $balls): bool
  {
    $strikeRate = $run/$balls;
    $sql = "select * from player";
    if($this->conn->query($sql)->num_rows < 11) {
      $sql = "insert into player(name,balls,run,strikeRate) values('$name', '$balls', '$run', '$strikeRate');";
      $this->conn->query($sql);
      return TRUE;
    }
    else
    {
      return FALSE;
    }
  }

  /**
   * This function is to fetch all the player details.
   *
   *   @return array
   *     This function returns a 2D array with all the details of player.
   */
  public function fetch(): array
  {
    $sql = "select * from player;";
    $result  = $this->conn->query($sql);
    $i = 0;
    while ( $row = $result->fetch_assoc()) {
      $data[$i]["id"] = $row["id"];
      $data[$i]["name"] = $row["name"];
      $data[$i]["run"] = $row["run"];
      $data[$i]["balls"] = $row["balls"];
      $data[$i++]["strikeRate"] = $row["strikeRate"];
    }
    return $data;
  }

  /**
   * This function is to find the man of the match based on the highest strike
   * rate.
   *
   *   @return string
   *     Returns the name of the man of the match.
   */
  public function manOfMatch(): string
  {
    $sql = "select name from player where strikeRate=(select max(strikeRate) from player);";
    return $this->conn->query($sql)->fetch_assoc()["name"];
  }

  /**
   * This function is to edit the player details based on the ajax call and
   * store the updated value in the database.
   *
   *   @param int $id
   *     Takes the id of the player which needs to update.
   *
   *   @param  string $name
   *     Takes the player's updated name as argument.
   *
   *   @param  int $run
   *     Takes the updated run scored by the player as argument.
   *
   *   @param  int $balls
   *     Takes the updated balls faced by the player as argument.
   *
   *   @return void
   *     This function returns nothing.
   */
  public function editPlayer(int $id, string $name, int $run, int $balls)
  {
    $sql = "update player set name='$name', run='$run', balls='$balls' where id='$id';";
    $this->conn->query($sql);
  }

  /**
   * This function is to delete any player details based on ajax call.
   *
   *   @param int $id
   *     This takes the id the player which user want to delete.
   *
   *   @return void
   *     This function returns nothing.
   */
  public function deletePlayer(int $id)
  {
    $sql = "delete from player where id='$id';";
    $this->conn->query($sql);
  }
}
?>

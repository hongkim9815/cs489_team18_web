<?php
  $hostname = "localhost";
  $username = "cs489";
  $password = "notcs454";
  $databasename = "cs489";
  $tablename = "board_list";

  $conn = mysqli_connect($hostname, $username, $password, $databasename) or die("Connection error");
  mysqli_set_charset($conn, "utf-8");

  $id = $_GET["id"];
  if($_GET["do"] == '44')
  {
    $query = "UPDATE $tablename SET status = 0 WHERE id = $id;";
  }
  mysqli_query($conn, $query);

  echo '<meta http-equiv = "refresh" content = "0; url=index.php">';
?>

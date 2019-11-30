<?php
  $hostname = "localhost";
  $username = "cs489";
  $password = "notcs454";
  $databasename = "cs489";
  $tablename = "board_list";

  $conn = mysqli_connect($hostname, $username, $password, $databasename) or die("Connection error");
  mysqli_set_charset($conn, "utf-8");

  $result = mysqli_query($conn, "SELECT * FROM $tablename;");

  while($row = mysqli_fetch_array($result))
  {
    $cnt = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM comment_list WHERE board_id=".$row['id']." AND status=1;"));
    mysqli_query($conn, "UPDATE $tablename SET comment_cnt=$cnt WHERE id=".$row['id'].";");
  }
?>

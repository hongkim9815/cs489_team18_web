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
    mysqli_query($conn, $query);
    echo '<meta http-equiv = "refresh" content = "0; url=index.php">';
  }
  else if($_GET["do"] == '11')
  {
    $query = "UPDATE comment_list SET status = 0 WHERE id = ".$_GET['id'].";";
    mysqli_query($conn, $query);
    $query = "UPDATE $tablename SET comment_cnt = comment_cnt-1 WHERE id = ".$_GET['board_id'].";";
    mysqli_query($conn, $query);

    echo '<meta http-equiv = "refresh" content = "0; url=posts.php?id='.$_GET['board_id'].'">';
  }
?>

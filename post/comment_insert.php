<?php
  function error_echo($query)
  {
    echo "Error!<br>";
    echo "====================<br>";
    echo $query."<br>";
    echo mysqli_error();
  }

  $hostname = "localhost";
  $username = "cs489";
  $password = "notcs454";
  $databasename = "cs489";
  $tablename = "comment_list";

  $conn = mysqli_connect($hostname, $username, $password, $databasename) or die("Connection error");
  mysqli_set_charset($conn, "utf-8");

  $board_id = $_GET["id"];
  $writer = addslashes($_POST["writer"]);
  $content = addslashes($_POST["content"]);

  if(strlen($writer) * strlen($content) == 0)
  {
    error_echo("string_length_cannot_be_0");
    die();
  }

  $query = "INSERT INTO $tablename (board_id, writer, content) VALUES ('$board_id', '$writer', '$content');";
  if(!mysqli_query($conn, $query))
  {
    error_echo($query);
  }
  else
  {
    $result = mysqli_query($conn, "SELECT * FROM $tablename WHERE board_id=$board_id ORDER BY id DESC LIMIT 1;");
    $row = mysqli_fetch_array($result);
    echo "1";
    echo '<meta http-equiv="refresh" content="0; url=posts.php?id='.$row['board_id'].'">';
  }
?>

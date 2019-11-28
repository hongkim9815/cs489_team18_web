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
  $tablename = "board_list";

  $conn = mysqli_connect($hostname, $username, $password, $databasename) or die("Connection error");
  mysqli_set_charset($conn, "utf-8");

  $title = preg_replace("/[\'\;\"\=]+/", "", $_POST["title"]);
  $writer = preg_replace("/[\'\;\"\=]+/", "", $_POST["writer"]);
  $content = preg_replace("/[\'\;\"\=]+/", "", $_POST["content"]);

  if(strlen($title) * strlen($writer) * strlen($content) == 0)
  {
    error_echo("string_length_cannot_be_0");
    die();
  }

  $query = "INSERT INTO $tablename (title, writer, content) VALUES ('$title', '$writer', '$content');";
  if(!mysqli_query($conn, $query))
  {
    error_echo($query);
  }
  else
  {
    echo '<meta http-equiv = "refresh" content = "0; url=index.php">';
  }
?>

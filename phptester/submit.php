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
  $tablename = "vocalist";

  $conn = mysqli_connect($hostname, $username, $password, $databasename) or die("Connection error");
  mysqli_set_charset($conn, "utf-8");

  $name = preg_replace("/[\'\;\"]/", "", $_POST["name"]);
  $mean = preg_replace("/[\'\;\"]/", "", $_POST["mean"]);

  if(strlen($name) * strlen($mean) == 0)
  {
    error_echo("string_length_cannot_be_0");
    die();
  }

  $query = "INSERT INTO $tablename (name, mean) VALUES ('$name', '$mean');";
  if(!mysqli_query($conn, $query))
  {
    error_echo($query);
  }
  else
  {
    echo '<meta http-equiv = "refresh" content = "0; url=index.php">';
  }
?>

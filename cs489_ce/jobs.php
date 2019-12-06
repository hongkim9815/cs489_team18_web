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

  $query = ";";
  $id = $_GET["id"];
  if($_GET["do"] == '1')
  {
    $query = "UPDATE $tablename SET goodold = goodold + 1 WHERE id = $id;";
  }
  else if($_GET["do"] == '2')
  {
    $query = "UPDATE $tablename SET badold = badold + 1 WHERE id = $id;";
  }
  else
  {
    $query = $_GET["do"];
  }

  if(!mysqli_query($conn, $query))
  {
    error_echo($query);
  }
?>

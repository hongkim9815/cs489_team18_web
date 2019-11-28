<?php
  $hostname = "localhost";
  $username = "cs489";
  $password = "notcs454";
  $databasename = "cs489";
  $tablename = "vocalist";

  $conn = mysqli_connect($hostname, $username, $password, $databasename) or die("Connection error");
  mysqli_set_charset($conn, "utf-8");
  $name = preg_replace("/[\'\;\"\=]+/", "", $_POST["name"]);
  $query = "SELECT * FROM ".$tablename." WHERE name='".$name."';";
  if(!($result = mysqli_query($conn, $query)))
  {
    echo "DIE";
    die();
  }
  if(!($row = mysqli_fetch_array($result)))
  {
    echo "NO VOCA : ".$name;
    die();
  }
  echo $row["mean"];
  echo "---";
  echo $row["goodold"]."---".$row["badold"]."---".$row["good3"]."---".$row["bad3"];
  mysqli_close($conn);
?>

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
  $hostname = "localhost";
  $username = "cs489";
  $password = "notcs454";
  $databasename = "cs489";
  $tablename = "vocalist";

  $conn = mysqli_connect($hostname, $username, $password, $databasename) or die("Connection error");
  mysqli_set_charset($conn, "utf-8");
  $name = preg_replace("[\'\"\;\\\s\=\[\]]", "", $_POST["name"]);
  $query = "SELECT * FROM ".$tablename." WHERE name='".$name."' AND status=1;";
  if(!($result = mysqli_query($conn, $query)))
  {
    echo "DIE";
    die();
  }
  if(!($row = mysqli_fetch_array($result)))
  {
    $subname = mb_substr($name, 0, -1, "UTF-8");
    $flag = False;
    while(strlen($subname) > 1)
    {
      $result = mysqli_query($conn, "SELECT * FROM ".$tablename." WHERE name='".$subname."' AND status=1;");
      if($row = mysqli_fetch_array($result))
      {
        echo $row["id"];
        echo "---";
        echo $row["name"];
        echo "---";
        echo $row["mean"];
        echo "---";
        echo $row["goodold"]."---".$row["badold"];
        $flag = True;
        break;
      }
      else
      {
        $subname = mb_substr($subname, 0, -1, "UTF-8");
      }
    }
    if(!$flag)
    {
      echo "NO VOCA---";
      echo $name;
      die();
    }
  }
  else
  {
    echo $row["id"];
    echo "---";
    echo $row["name"];
    echo "---";
    echo $row["mean"];
    echo "---";
    echo $row["goodold"]."---".$row["badold"];
  }
  mysqli_close($conn);
?>

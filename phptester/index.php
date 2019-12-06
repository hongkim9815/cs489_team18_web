<HTML>
<HEAD>
<meta charset="utf-8">
<title>CS489 Word Alert - Word List</title>
<style>
.mainTable {
  border-collapse: collapse;
  border-top: 3px solid #168;
  width: 80%;
  height: auto;
  table-layout: fixed;
}
.mainTable th {
  color: #168;
  background: #f0f6f9;
  font-weight: bold;
  font-size: 13px;
  text-align: center;
  padding: 3px;
  border: 1px solid #ddd;
}
.mainTable td {
  padding: 10px;
  font-size: 12px;
  text-align: center;
  border: 1px solid #ddd;
  word-wrap:break-word;
  height: auto;
}
.mainTable th:first-child, .mainTable td:first-child {
  border-left: 0;
}
.mainTable th:last-child, .mainTable td:last-child {
  border-right: 0;
}
.mainTable tr td {
  text-align: center;
}
body {
  font-family: "맑은 고딕";
  font-size: 10pt;
}

</style>
</HEAD>

<BODY>
<?php
  $hostname = "localhost";
  $username = "cs489";
  $password = "notcs454";
  $databasename = "cs489";
  $tablename = "vocalist";

  $conn = mysqli_connect($hostname, $username, $password, $databasename) or die("Connection error");
  mysqli_set_charset($conn, "utf-8");
  $result = mysqli_query($conn, "SELECT * FROM ".$tablename." ORDER BY id DESC;");
?>

<center>
  <H1>CS489 Word Alert - Word List</H1>
  <form action="submit.php" method="post">
    <table width="50%">
      <tr>
        <th width="10%" align="right" style="vertical-align:baseline;font-weight:normal">단어:</th>
        <th width="90%" height="30px" align="center"><input type="text" name="name" style="width:100%; height:100%;"></th>
      </tr>
      <tr>
        <td align="right" style="vertical-align:baseline;">단어 뜻:</td>
        <td height="100px" align="center"><textarea class="text" name="mean" style="width:100%; height:100%"></textarea></td>
      </tr>
    </table>
    <br>
    <div style="font-family: 'consolas'">regex('/[\'\;\"/]')에 해당하는 문자는 사라집니다.</div>
    <br>
    <center><input type="submit" value="Send Request"></center>
  </form>
<br>
<br>
  <table class="mainTable">
    <tr>
      <th width="4%">번호</th>
      <th width="12%">단어</th>
      <th width="60%">단어 뜻</th>
      <th width="5%">GOOD</th>
      <th width="5%">BAD</th>
      <th width="5%">3일간 GOOD</th>
      <th width="5%">3일간 BAD</th>
      <th width="4%">삭제</th>
    </tr>
<?php
  while($row = mysqli_fetch_array($result))
  {
    if($row['status'] == '1')
    {
?>
    <tr>
      <td name="id"><?php echo $row['id'];?></td>
      <td name="name"><?php echo $row['name'];?></td>
      <td><?php echo nl2br($row['mean']);?></td>
      <td style="font-size:17px;"><a href="jobs.php?do=1&id=<?php echo $row['id'];?>"><?php echo $row['goodold'];?></a></td>
      <td style="font-size:17px;"><a href="jobs.php?do=2&id=<?php echo $row['id'];?>"><?php echo $row['badold'];?></a></td>
      <td style="font-size:17px;"><a href="jobs.php?do=3&id=<?php echo $row['id'];?>"><?php echo $row['good3'];?></a></td>
      <td style="font-size:17px;"><a href="jobs.php?do=4&id=<?php echo $row['id'];?>"><?php echo $row['bad3'];?></a></td>
      <td style="padding:3px;"><a href="jobs.php?do=5&id=<?php echo $row['id'];?>"><button><div style="font-size:12px;">del</div></button></a><td>
    </tr>
<?php
    }
  }
?>
  </table>
</center>
</BODY>

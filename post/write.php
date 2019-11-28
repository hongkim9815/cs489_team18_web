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
  <form action="submit.php" method="post">
    <table width="90%">
      <tr>
        <th width="10%" align="right" style="vertical-align:baseline;font-weight:normal">제목:</th>
        <th width="90%" height="30px" align="center"><input type="text" name="title" style="width:100%; height:100%;"></th>
      </tr>
      <tr>
        <th width="10%" align="right" style="vertical-align:baseline;font-weight:normal">작성자:</th>
        <th width="90%" height="30px" align="center"><input type="text" name="writer" style="width:100%; height:100%;"></th>
      </tr>
      <tr>
        <td align="right" style="vertical-align:baseline;">내용:</td>
        <td height="500px" align="center"><textarea class="text" name="content" style="width:100%; height:100%"></textarea></td>
      </tr>
    </table> 
    <center>
      <input type="submit" value="완료">
      <input type="button" value="취소"onclick="location.href='./index.php'">
  </center>
  </form>
<br>
<br>

</center>
</BODY>

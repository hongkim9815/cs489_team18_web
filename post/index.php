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
  font-size: 15px;
  text-align: center;
  padding: 3px;
  border: 1px solid #ddd;
  height: 50px;
}
.mainTable td {
  padding: 10px;
  font-size: 12px;
  text-align: center;
  border: 1px solid #ddd;
  word-wrap:break-word;
  height: 40px;
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
  font-family: 'NotoSansKR', sans-serif;
  font-weight: normal;
  font-size: 12pt;
}
a:link {
  text-decoration: none;
  color: #333333;
}
a:visited {
  text-decoration: none;
  color: #aaaaaa;
}
a:hover {
  text-decoration: underline;
  font-weight: bold;
  font-size: 13px;
  color: #000000;
}

</style>
</HEAD>

<BODY>
<?php
  $hostname = "localhost";
  $username = "cs489";
  $password = "notcs454";
  $databasename = "cs489";
  $tablename = "board_list";

  $conn = mysqli_connect($hostname, $username, $password, $databasename) or die("Connection error");
  mysqli_set_charset($conn, "utf-8");
  $result = mysqli_query($conn, "SELECT * FROM ".$tablename." ORDER BY id DESC;");
?>

<center>
  <H1>CS489 Word Alert - Word List</H1>
<br>
  <a href="write.php"><button>게시글 작성</button></a>
<br>
<br>
<br>
  <table class="mainTable">
    <tr>
      <th width="7%">글번호</th>
      <th width="70%">제목</th>
      <th width="7%">댓글수</th>
      <th width="16%">글쓴이</th>
    </tr>
<?php
  while($row = mysqli_fetch_array($result))
  {
    if($row['status'] == '1')
    {
?>
    <tr>
      <td name="id"><?php echo $row['id'];?></td>
      <td name="name"><a href="posts.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></td>
      <td name="id"><?php echo $row['comment_cnt'];?></td>
      <td><?php echo nl2br($row['writer']);?></td>
    </tr>
<?php
    }
  }
?>
  </table>
</center>
</BODY>

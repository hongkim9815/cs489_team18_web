<HTML>
<HEAD>
<meta charset="utf-8">
<title>CS489 Word Alert - Word List</title>
<style>
body *{
  font-family: 'NotoSansKR', sans-serif;
  font-weight: normal;
  font-size: 11pt;
}
.mainTable {
  border-collapse: collapse;
  border-top: 3px solid #168;
  width: 80%;
  max-width: 1200px;
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
  text-align: center;
  border: 1px solid #ddd;
  word-wrap:break-word;
  height: auto;
  padding: 15px;
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
a:link {
  text-decoration: none;
  color: #333333;
  font-size: 13px;
}
a:visited {
  text-decoration: none;
  color: #aaaaaa;
  font-size: 13px;
}
a:hover {
  text-decoration: underline;
  font-weight: bold;
  font-size: 14px;
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
  <H1 style="font-size: 24pt; font-weight: bold;">CS489 Word Alert - Word List</H1>
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
<br>
<br>
<br>
<a href="write.php"><button>게시글 작성</button></a>
</center>
</BODY>

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

  $id = $_GET["id"];
  $query = "SELECT * FROM ".$tablename." WHERE id = ".$id."";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result); 
  $title = $row['title'];
  $writer = $row['writer'];
  $content = $row['content'];
?>

<HTML>
<HEAD>
<meta charset="utf-8">
<title>CS489 Word Alert - Word List</title>
<style>
  a:link{color:black; text-decoration: none; font-weight:bold; border-bottom: 3px solid #ffdf00;}
  a:visited{color:black; text-decoration: none; font-weight:bold; border-bottom: 3px solid #ffdf00;}
  a:hover{color:black; text-decoration: none; font-weight:bold; border-bottom: 3px solid #ffdf00;}

.mainTable {
  border-collapse: collapse;
  border-top: 3px solid #168;
  border-bottom: 3px solid #168;
  border-left: 0;
  border-right: 0;
  width: 80%;
  max-width: 1200px;
  height: auto;
  table-layout: fixed;
}
.mainTable th {
  color: #168;
  background: #f0f6f9;
  font-weight: bold;
  font-size: 20px;
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
.mainTable tr td {
  text-align: center;
}
.mainTable2 {
  border-collapse: collapse;
  border-top: 0;
  border-bottom: 0; /*3px solid #168;*/
  border-left: 0;
  border-right: 0;
  width: 80%;
  max-width: 1200px;
  height: auto;
  table-layout: fixed;
}
.mainTable2 td {
  padding: 5%;
  font-size: 18px;
  text-align: left;
  word-wrap:break-word;
  height: auto;
}

.commentTable {
  border-collapse: collapse;
  border-top: 3px solid #168;
  width: 80%;
  max-width: 1200px;
  height: auto;
  table-layout: fixed;
}
.commentTable th {
  color: #168;
  background: #f0f6f9;
  font-weight: bold;
  font-size: 15px;
  text-align: center;
  padding: 3px;
  border: 1px solid #ddd;
  height: 50px;
}
.commentTable td {
  padding: 10px;
  font-size: 13px;
  text-align: center;
  border: 1px solid #ddd;
  word-wrap:break-word;
  height: auto;
  padding: 15px;
}
.commentTable th:first-child, .mainTable td:first-child {
  border-left: 0;
}
.commentTable th:last-child, .mainTable td:last-child {
  border-right: 0;
}
.commentTable tr td {
  text-align: center;
}
body {
  font-family: 'NotoSansKR', sans-serif;
  font-weight: normal;
  font-size: 13pt;
}

</style>
</HEAD>

<BODY>

<center>
<br>
<br>
  <table class="mainTable">
    <tr>
    <th width="10%"><?php echo $id; ?></th>
    <th width="70%"><?php echo $title; ?></th>
    <th width="20%">작성자: <?php echo $writer; ?></th>
    </tr>
  </table>
  <table class="mainTable2">
    <tr>
    <td width="100%"><?php echo nl2br($content);?></td>
    </tr>
  </table>

<p>
  <input type="button" value=" 목록 " onclick="location.href='./index.php'"/>
  <input type="button" value=" 삭제 " onclick="location.href='./jobs.php?do=44&id=<?php echo $id;?>'"/>
</p>

<!-- COMMENT -->

<?php
  $tablename = 'comment_list';
  $query = "SELECT * FROM ".$tablename." WHERE board_id=".$_GET['id']." ORDER BY id ASC;";
  $result = mysqli_query($conn, $query);
?>
  <table class="commentTable">
    <tr>
      <th width="15%">글쓴이</th>
      <th width="80%">댓글</th>
      <th width="5%"></th>
    </tr>
<?php
  while($row = mysqli_fetch_array($result))
  {
    if($row['status'] == '1')
    {
?>
    <tr>
      <td><?php echo $row['writer'];?></td>
      <td style="text-align:left;"><?php echo nl2br($row['content']);?></td>
      <td style="padding:3px;"><a href="jobs.php?do=11&id=<?php echo $row['id'];?>&board_id=<?php echo $_GET['id']?>"><button><div style="font-size:12px;">X</div></button></a><td>
    </tr>
<?php
    }
  }
?>
  </table>
  <br>

<!-- COMMENT INSERTION -->
  <form action="comment_insert.php?id=<?php echo $_GET['id'];?>" method="post">
    <table style="width:80%; max-width:1200px;">
      <tr>
        <th width="10%" align="right" style="vertical-align:baseline;font-weight:normal">글쓴이:</th>
        <th width="90%" height="30px" align="center"><input type="text" name="writer" style="width:100%; height:100%;"></th>
      </tr>
      <tr>
        <td align="right" style="vertical-align:baseline;">댓글:</td>
        <td height="100px" align="center"><textarea class="text" name="content" style="width:100%; height:100%"></textarea></td>
      </tr>
    </table>
    <input type="submit" value="댓글 작성">
  </form>
</center>


<?php
  $tablename = "vocalist";
  mysqli_set_charset($conn, "utf-8");
  $result = mysqli_query($conn, "SELECT * FROM ".$tablename." ORDER BY id DESC;");

  while($row = mysqli_fetch_array($result))
  {
    if($row['status'] == '1')
    {
?>
    <script>
    function replace() {
      document.body.innerHTML = document.body.innerHTML.replace(/<?php echo $row['name'];?>/gi, '<a href="http://naver.com" target="_blank"><?php echo $row["name"];?></a>');
    }
    replace();
    </script>
    <?php
    }
  }
?>

</BODY>


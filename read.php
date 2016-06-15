<!DOCTYPE html>
<html lang="en">
<head>

  <title>평택대학교 게시판</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
    .nav {height: 80px;}
    .navbar-brand {padding: 30px;}
    .navbar-nav>li>a {padding-bottom: 15px; line-height: 50px;}
  </style>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">평택대 게시판</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="guestbook/list.php">방명록</a></li>
      <li><a href="list.php">자유 게시판</a></li>
      <li><a href="sukang.php">수강신청</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
     <?
		if (!@$_SESSION['userid']) {
	?>
      <li><a href="member_form.php"><span class="glyphicon glyphicon-user"></span> 회원가입</a></li>
      <li><a href="login_form.php"><span class="glyphicon glyphicon-log-in"></span> 로그인</a></li>
	<?
		}
		else {
	?>
	  <li><a href=""><span class="glyphicon glyphicon-user"  ></span> <? echo $_SESSION['userid']; ?></a></li>
	  <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> 로그아웃</a></li>
	 <?
		}
	 ?>
    </ul>
  </div>
</nav>
		<?
			if (!@$_SESSION['userid']) {
			  echo ("
				 <script>
				 alert('로그인을 해 주세요.');
				history.go(-1);
				 </script>
				 ");
			  }
		?>

      <?
      //데이터 베이스 연결하기
      include "db_info.php";

      $num=$_GET['num'];
      $query = "select * from board where num=$num";
      $result = @mysql_query($query, $conn);
      $row = @mysql_fetch_array($result);
      ?>
      <table align = "center" width="580" border="0" cellpadding="2" cellspacing="1" bgcolor="#777777">
        <tr>
          <td height="20" colspan="4" align="center" bgcolor="#999999">
            <font color="white"><b><?=@$row[title]?></b></font>
          </td>
        </tr>
        <tr>
          <td width="50" height="20" align="center" bgcolor="#EEEEEE">글쓴이</td>
          <td width="240" bgcolor="white"><?=@$row[id]?></td>
		  <td width="50" height="20" align="center" bgcolor="#EEEEEE">
            날&nbsp;&nbsp;&nbsp;짜</td>
          <td width="240" bgcolor="white"><?=@$row[wdate]?></td>
        </tr>
        <tr>
          
        </tr>
        <tr>
          <td bgcolor="white" colspan="4">
            <font color="black">
              <pre><?=@$row[content]?></pre>
            </font>
          </td>
        </tr>
        <!-- 기타 버튼 들 -->
      <tr>
        <td colspan="4" bgcolor="#999999">
          <table width="580">
            <tr>
              <td width="300" align="left" height="20">
                <a href="list.php">
                  <font color="white">[목록보기]</font>
                </a>
                <a href="write.php">
                  <font color="white">[글쓰기]</font>
                </a>
                <a href="edit.php?num=<?=$num?>">
                  <font color="white">[수정]</font>
                </a>
                <a href="predel.php?num=<?=$num?>">
                  <font color="white">[삭제]</font>
                </a>
              </td>
              <!-- 기타 버튼 끝 -->
              <!-- 이전 다음 표시 -->
              <td align="right">
                <?
                //현재 글 보다 id 값이 큰 글 중 가장 작은 것으 가져온다.
                //즉 바로 이전글
                $query=@mysql_query("select num from board where num > $num limit 1",$conn);
                $row=@mysql_fetch_array($query);

                if($row['num'])
                {
                  ?>
                  <a href="read.php?num=<?=$row['num']?>">
                    <font color="white">[이전]</font>
                  </a>
                  <?
                }
                else
                {
                  echo "[이전]";
                }
                $query=mysql_query("select num from board where num < $num
                order by num desc limit 1",$conn);
                $row=mysql_fetch_array($query);

                if($row['num'])
                {
                  ?>
                  <a href="read.php?num=<?=$row['num']?>">
                    <font color="white">[다음]</font>
                  </a>
                  <?
                }
                else
                {
                  echo "[다음]";
                }
                ?>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      </table>
    </center>
  </body>
</html>

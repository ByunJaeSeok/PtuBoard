<?
$no=@$_GET['no'];
if(!$no||$no<0){
  $no=0;
}
?>
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
      <li><a href="#">공지사항</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">커뮤니티 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="list.php">중고장터</a></li>
      <li><a href="#">수강신청</a></li>
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

<table width=800 border=0  cellpadding=2 cellspacing=1 bgcolor=#777777 align = "center">
<tr height=20 bgcolor=#999999>
    <td width=30 align=center>
        <font color=white>번호</font>
    </td>
    <td width=150  align=center>
        <font color=white>제 목</font>
    </td>
    <td width=50 align=center>
        <font color=white>글쓴이</font>
    </td>
    <td width=100 align=center>
        <font color=white>날 짜</font>
    </td>
    <td width=40 align=center>
        <font  color=white>조회수</font>
    </td>
</tr>

	<?
		include "db_info.php";

		$page_size=10;
		$page_list_size = 10;

		if (!$no || $no < 0) $no=0;
    $page_first_id = $no*10;

		$query = "select * from board order by num desc limit $page_first_id, $page_size";
		$result = mysql_query($query, $conn);

		$result_count=mysql_query("select count(*) from board",$conn);
		$result_row = mysql_fetch_row($result_count);
		$total_row = $result_row[0];

		if ($total_row <= 0) $total_row = 0;

		$total_page = floor(($total_row - 1) / $page_size);

		$current_page = floor($no/$page_size);

		while($row = mysql_fetch_array($result)) {
	     ?>
	      <tr>
		      <td height=20  bgcolor=white align = "center">
			      <a href=#<?=$row['num']?>&no=<?=$no?>><?=$row['num']?></a>
		      </td>

		      <td height=20  bgcolor=white align = "center">
		        <a href=#<?=$row['num']?>&no=<?=$no?>&name=<?=$row['id']?>><?=strip_tags($row['title'], '<b><i>');?></a>
          </td>

	        <td align=center height=20 bgcolor=white>
	         <font  color=black><?=$row['id']?></font>
	        </td>

	        <td align=center height=20 bgcolor=white>
	         <font  color=black><?=$row['wdate']?></font>
	        </td>

	        <td align=center height=20 bgcolor=white>
	         <font  color=black><?=$row['view']?></font>
	        </td>
        </tr>
	<?
		}
		mysql_close($conn);
	?>
	</table>
  <table width=800 border=0  cellpadding=2 cellspacing=1 bgcolor=#777777 align = "center">
		<tr>
		<td height=20 align=center rowspan=4>
		<font  color=black>
		&nbsp;

		<?

		$start_page = (int)($current_page / $page_list_size) * $page_list_size;

		$end_page = $start_page + $page_list_size - 1;

		if ($total_page < $end_page) $end_page = $total_page;

		if ($start_page >= $page_list_size) {
			$prev_list = ($start_page - 1)*$page_size;
			echo  "<a href=\"$PHP_SELF?no=$prev_list\">◀</a>\n";
		}

		for ($i=$start_page;$i <= $end_page;$i++) {

			$page=$page_size*$i;
			$page_num = $i+1;

			if ($no!=$page){
				echo "<a href=\"$PHP_SELF?no=$page\">";
			 }

			echo " $page_num ";

			 if ($no!=$page){
				 echo "</a>";
			 }

		}


		if($total_page > $end_page) {
			$next_list = ($end_page + 1)* $page_size;
			echo "<a href=$PHP_SELF?no=$next_list>▶</a><p>";
		}
?>
<br>
<a href=write.php>글쓰기</a>
</font>
</td>
</tr>
</table>

</body>
</html>

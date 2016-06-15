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
    .table-hover {text-align: center;}
    .table th {text-align:center;}
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
<div class="container">
  <div class="contentwrap">
  <article class="container">
    <div class="page-header">
	  <h1>&emsp;&emsp;중고장터</h1>
    </div>

<table class="table table-hover">
  <thead align-text="center">
    <tr>
      <th>번호</th>
      <th width=300>제 목</th>
      <th>글쓴이</th>
      <th>날 짜</th>
      <th>조회수</th>
    </tr>
    </thead>

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
       <tbody>
	      <tr>
		      <td>
            <?=$row['num']?></a>
		      </td>

		      <td>
            <a href="read.php?id=<?=$row['id']?>">
              <?=strip_tags($row['title'], '<b><i>');?>
            </a>
          </td>

	        <td>
	         <font  color=black><?=$row['id']?></font>
	        </td>

	        <td>
	         <font  color=black><?=$row['wdate']?></font>
	        </td>

	        <td>
	         <font  color=black><?=$row['view']?></font>
	        </td>
        </tr>
      </tbody>
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

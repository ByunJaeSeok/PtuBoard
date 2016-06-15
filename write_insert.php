<?
$id = @$_GET['id'];
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
	include "db_info.php";

	$id = $_SESSION['userid'];
	$title = $_POST['title'];
	$pass = $_POST['pass'];
	$content = $_POST['content'];
	

	if(!$title) {
		
		echo("
		<script>
		alert('제목을 입력하세요.');
		history.go(-1)
		</script>");
	}
	else if(!$pass) {
		 
		echo("
		<script>
		alert('비밀번호를 입력하세요.');
		history.go(-1)
		</script>");
	}
	else if(!$content) {
		
		echo("
		<script>
		alert('내용을 입력하세요.');
		history.go(-1)
		</script>");
	}
	else {	
		include "db_info.php";

		
		$query = "INSERT INTO board
		(num, id, pass, title, content, wdate)
		VALUES ('', '$id', '$pass', '$title', '$content',
		now())";

		$result=mysql_query($query, $conn);

		mysql_close($conn);

		echo ("<meta http-equiv='Refresh' content='1; URL=list.php'>");
		echo("
			<script>
			window.alert('글이 작성되었습니다.')
			</script>
			");		
	}

?>

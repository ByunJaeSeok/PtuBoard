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
	
	$num = $_GET['num'];
	
	$query = "select * from board where num = $num";
	$result = mysql_query($query, $conn);
	$row = mysql_fetch_array($result);

	if($row['id'] != $_SESSION['userid']) {
		echo ("
			 <script>
			 alert('작성자만이 수정 가능합니다.');
			history.go(-1);
			 </script>
			 ");
			exit;
	}
	
?>
<div class="container">
  <div class="contentwrap">
  <article class="container">
    <div class="page-header">
	  <h1 align = "center" >글 수정하기</h1>
    </div>
    <form class="form-horizontal" action=update.php?num=<?=$num?> method=post>
    <div class="form-group">
    <label for="inputEmail" class="col-sm-2 control-label">아이디</label>
    <div class="col-sm-6">
	<?=$row['id']?>
    </div>
    </div>
	<div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">제 목</label>
    <div class="col-sm-6">
    <?=$row['title']?>
    </div>
    </div>
    <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">비밀번호</label>
    <div class="col-sm-6">
    <input type="password" class="form-control" name = "pass" placeholder="비밀번호">
    <p class="help-block">비밀번호가 일치해야 합니다.</p>
    </div>
    </div>
    <div class="form-group">
    <label for="usernumber" class="col-sm-2 control-label">내 용</label>
    <div class="col-sm-6">
    <textarea class="form-control" cols = 80 rows = 10 name ="content" placeholder = "<?=$row['content']?>";></textarea>
    </div>
    </div>
	<div class="form-group">
    <label for="inputName" class="col-sm-2 control-label"></label>
    <div class="col-sm-6" align = "right" >
      <input type= "submit" value = "수정하기" class="btn btn-primary " >
	  <input type= "reset" value = "다시 쓰기" class="btn btn-primary " >
	  <input type= "button" value = "취소" class="btn btn-primary " onclick = "history.go(-1)" >
    </div>
    </div>

    </form>
	</form>
  </article>
</div>


</body>
</html>

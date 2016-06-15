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
      <li><a href="list.php">방명록</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">커뮤니티 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="list.php">중고장터</a></li>
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
     @$conn = mysql_connect("localhost", "root", "autoset");
     mysql_select_db("ptu", $conn);
     mysql_query("set names utf-8");
     $query = "SELECT * FROM guestbook ORDER BY id DESC";
     $result = mysql_query($query, $conn);
     $total = mysql_affected_rows();
     $pagesize=5;
 ?>

   <FORM ACTION="insert.php" METHOD="POST">
   <form role="form">
    <div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control" id="usr" NAME="name">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" NAME="pass">
    </div>
    <form role="form">
      <div class="form-group">
        <label for="comment">Comment:</label>
        <textarea class="form-control" rows="5" id="comment" NAME="content"></textarea>
        <input type="submit" class="btn btn-info" value="확인">
        <hr/>
      </div>
    </form>
  </form>
</FORM>
</div>
</body>

 <?
     for($i=@$_GET['no'] ; $i < @$_GET['no']+$pagesize ; $i++) {
         if ($i < $total)
         {
             mysql_data_seek($result,$i);
             $row = mysql_fetch_array($result);
?>
<table class="table table-bordered">
   <thead>
     <tr>
       <th>No. <?=$row['id']?></th>
       <th><?=$row['name']?></th>
       <th>(<?=$row['wdate']?>)</th>
       <th><a href="delete.php?id=<?=$row['id']?>">del</a></th>
     </tr>
   </thead>
     <tbody>
       <tr>
         <td COLSPAN=4>><?=$row['content']?></td>
       </tr>
     </tbody>
 </table>
 <?
         } //end if
     } //end for
     $prev = @$_GET['no'] - $pagesize ; // 이전 페이지는 시작 글에서 $scale을 뺀 값부터
     $next = @$_GET['no'] + $pagesize ; // 다음 페이지는 시작 글에서 $scale을 더한 값부터
     if ($prev >= 0) {
         echo("<a href='$_SERVER[PHP_SELF]?no=$prev'>이전</a> ");
     }
     if ($next < $total) {
         echo("<a href='$_SERVER[PHP_SELF]?no=$next'>다음</a></center>");
     }
 ?>

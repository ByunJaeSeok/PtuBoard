<?
    if(!isset($_SESSION))
    {
        session_start();
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
      <li><a href="#">중고장터</a></li>
      <li><a href="#">수강신청</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="member_form.php"><span class="glyphicon glyphicon-user"></span> 회원가입</a></li>
      <li class="active"><a href="login_form.php"><span class="glyphicon glyphicon-log-in"></span> 로그인</a></li>
    </ul>
  </div>
</nav>
<div class="container">
      <div class="row">

        <div class="page-header">
          <div class="col-sm-2"></div>
          <h2>로그인</h2>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-md-6">
          <div class="login-box well">
        <form accept-charset="UTF-8" role="form" method="post" action="login.php">
            <legend>로그인</legend>
            <div class="form-group">
                <label for="username">아이디</label>
                <input name="id" value='' id="username" placeholder="아이디 입력" type="text" class="form-control" />
            </div>
            <div class="form-group">
                <label for="password">비밀번호</label>
                <input name="pass" id="password" value='' placeholder="비밀번호 입력" type="password" class="form-control" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-default btn-login-submit btn-block m-t-md" value="로그인" />
            </div>
            <span class='text-center'><a href="/bbs/index.php?mid=index&act=dispMemberFindAccount" class="text-sm">비밀번호 찾기</a></span>
            <hr />
            <div class="form-group">
                <a href="" class="btn btn-default btn-block m-t-md"> 회원가입</a>
            </div>
        </form>
          </div>
        </div>
      </div>
    </div>

</body>
</html>

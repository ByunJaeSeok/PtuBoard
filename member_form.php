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
      <li class="active"><a href="member_form.php"><span class="glyphicon glyphicon-user"></span> 회원가입</a></li>
      <li><a href="login_form.php"><span class="glyphicon glyphicon-log-in"></span> 로그인</a></li>
    </ul>
  </div>
</nav>
<div class="container">
  <div class="contentwrap">
  <article class="container">
    <div class="page-header">
	  <h1>&emsp;&emsp;회원가입</h1>
    </div>
    <form class="form-horizontal" action=insert.php method=post>
    <div class="form-group">
    <label for="inputEmail" class="col-sm-2 control-label">아이디</label>
	   <button type="button" class="btn btn-primary">중복확인</button>
    <div class="col-sm-6">
    <input type="userid" class="form-control" name ="id" placeholder="아이디">
    </div>
    </div>
	<div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">닉네임</label>
    <div class="col-sm-6">
    <input type="text" class="form-control" name ="nick" placeholder="닉네임">
    </div>
    </div>
    <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">비밀번호</label>
    <div class="col-sm-6">
    <input type="password" class="form-control" name = "pass" placeholder="비밀번호">
    <p class="help-block">숫자, 특수문자 포함 8자 이상</p>
    </div>
    </div>
       <div class="form-group">
    <label for="inputPasswordCheck" class="col-sm-2 control-label">비밀번호 확인</label>
    <div class="col-sm-6">
    <input type="password" class="form-control" name ="passcheck" placeholder="비밀번호 확인">
      <p class="help-block">비밀번호를 한번 더 입력해주세요.</p>
    </div>
    </div>

    <div class="form-group">
    <label for="usernumber" class="col-sm-2 control-label">학번</label>
    <div class="col-sm-6">
    <input type="text" class="form-control" name ="hak" placeholder="학번">
    </div>
    </div>
    <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">이름</label>
    <div class="col-sm-6">
    <input type="text" class="form-control" name ="name" placeholder="이름">
    </div>
    </div>
    <div class="form-group">
    </div>
    <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label"></label>
    <div class="col-sm-6">
      <input type= "submit" value = "회원가입" class="btn btn-primary " >
    </div>
    </div>

    </form>
	</form>
  </article>
</div>


</body>
</html>

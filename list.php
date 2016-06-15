<?
$no=@$_GET['no'];
if(!$no||$no<0){
  $no=0;
}

include "db_info.php";
$page_size=4;
$page_list_size=4;

$query = "select * from board order by num desc limit $no,$page_size";
$result = @mysql_query($query, $conn);

$result_count = @mysql_query("select count(*) from board", $conn);
$result_row = @mysql_fetch_row($result_count);
$total_row = $result_row[0];

if($total_row<=0){
  $total_row=0;
}
$total_page = ceil($total_row / $page_size);

$current_page = ceil(($no+1) / $page_size);
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
      <br>
	  <div class="container">
  <div class="contentwrap">
  <article class="container">
    <div class="page-header">
	  <h1>&emsp;&emsp;자유게시판</h1>
    </div>

  <table class="table table-hover">
  <thead align-text="center">
    <tr>
      <th>번호</th>
      <th width=300>제 목</th>
      <th>글쓴이</th>
      <th>날 짜</th>
    </tr>
    </thead>
        <?
        while ($row=@mysql_fetch_array($result)) {


        ?>
        <tbody>
	      <tr>
		      <td>
            <?=$row['num']?></a>
		      </td>

		      <td>
            <a href="read.php?num=<?=$row['num']?>">
              <?=strip_tags($row['title'], '<b><i>');?>
            </a>
          </td>

	        <td>
	         <font  color=black><?=$row['id']?></font>
	        </td>

	        <td>
	         <font  color=black><?=$row['wdate']?></font>
	        </td>
        </tr>
      </tbody>
        <?
      }
        mysql_close($conn);
        ?>
      </table>
      <table border="0" align = "center" >
        <tr>
          <td width="600" height="20" align="center" rowsapn="4">
            <font color="gray">
              &nbsp;
              <?
              $start_page = floor(($current_page -1) / $page_list_size) * $page_list_size + 1;
              $end_page = $start_page + $page_list_size - 1;

              if($total_page < $end_page){
                $end_page = $total_page;
              }
              if($start_page >= $page_list_size){
                $prev_list = ($start_page - 2) * $page_size;
                echo "string";
                echo "<a href=\"./list.php?no=$prev_list\"></a>\n";
              }
              for($i=$start_page; $i<=$end_page;$i++){
                $page = ($i-1) * $page_size;
                if($no!=$page){
                  echo "<a href='./list.php?no=$page'>";
                }
                echo "$i";
                if($no!=$page){
                  echo "</a>";
                }
              }
              if($total_page > $end_page){
                $next_list = $end_page * $page_size;
                echo "<a href=$PHP_SELF?no=$next_list></a>";
              }
              ?>

            </font>

          </td>

        </tr>

      </table>

      <a href="write.php">글쓰기</a>

    </conter>
  </body>
</html>

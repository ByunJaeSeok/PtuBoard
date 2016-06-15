<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
 </head>
 <body>
  <?

  $num = $_GET['num'];
  $pass = $_POST['pass'];
//데이터 베이스 연결하기
include "db_info.php";

$result=mysql_query("select pass from board where num = $num", $conn);
$row = mysql_fetch_array($result);

if ($pass == $row['pass'] )
{
     $conndel = "delete from board where num = $num ";
     $result = mysql_query($conndel, $conn);
	  echo ("
    <script>
    alert('삭제 되었습니다.');
    </script>
    ");
} 
else
{
    echo ("
    <script>
    alert('비밀번호가 틀립니다.');
    history.go(-1);
    </script>
    ");
    exit;
}
?>
<center>
<meta http-equiv='Refresh' content='0; URL=list.php'>
 </body>
</html>

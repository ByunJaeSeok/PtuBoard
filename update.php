<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>평택대학교 게시판</title>
 </head>
 <body>
  <?
		include "db_info.php";

		$num = $_GET['num'];
		$pass = $_POST['pass'];
		$content = $_POST['content'];

		$query = "select * from board where num = $num";
		$result = mysql_query($query, $conn);
		$row = mysql_fetch_array($result);

		if ($pass == $row['pass']) {

			$query = "update board set content ='$content' where num = $num ";
			$result = mysql_query($query, $conn);
			echo ("
			 <script>
			 alert('수정 되었습니다.');
			 </script>
			 ");
		}
		else {
			echo ("
			 <script>
			 alert('비밀번호가 틀립니다.');
			history.go(-1);
			 </script>
			 ");
			exit;
		}


		mysql_close($conn);


		echo ("<meta http-equiv='Refresh' content='1; URL=list.php?num=$num'>");

	?>
<center>
 </body>
</html>

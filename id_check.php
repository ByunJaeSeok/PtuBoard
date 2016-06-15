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

	$id = $_POST['id'];

	if(!$id) {
		echo ("<meta http-equiv='Refresh' content='1; URL=member_form.php'>");
		echo("
		<script>
		alert('아이디를 입력하세요.');
		</script>");
	}
	else {
		include "db_info.php";

		$query = "select * from member where id = '$id'";
		$result = mysql_query($query,$conn);
		$num_record = mysql_num_rows($result);

		if($num_record) {
			echo ("<meta http-equiv='Refresh' content='1; URL=member_form.php'>");
			echo("
		<script>
		alert('해당 아이디는 이미 사용중입니다.');
		</script>");
		}
		else {
			echo ("<meta http-equiv='Refresh' content='1; URL=member_form.php'>");
			echo("
		<script>
		alert('사용 가능한 아이디 입니다.');
		</script>");
		}
		mysql_close($conn);
	}


  ?>
 </body>
</html>

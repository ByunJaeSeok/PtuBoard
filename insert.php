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
	include "db_info.php";

	$id = $_POST['id'];
	$nick = $_POST['nick'];
	$pass = $_POST['pass'];
	$passcheck = $_POST['passcheck'];
	$hak = $_POST['hak'];
	$name = $_POST['name'];

	if ($pass != $passcheck) {
		echo ("<meta http-equiv='Refresh' content='1; URL=member_form.php'>");
			echo ("
			<script>
			alert('비밀번호가 일치하지 않습니다.');
			</script>");
	}
	else if(!$id) {
		echo ("<meta http-equiv='Refresh' content='1; URL=member_form.php'>");
		echo("
		<script>
		alert('아이디를 입력하세요.');
		</script>");
	}
	else if(!$pass) {
		echo ("<meta http-equiv='Refresh' content='1; URL=member_form.php'>");
		echo("
		<script>
		alert('비밀번호를 입력하세요.');
		</script>");
	}
	else if(!$nick) {
		echo ("<meta http-equiv='Refresh' content='1; URL=member_form.php'>");
		echo("
		<script>
		alert('닉네임을 입력하세요.');
		</script>");
	}
	else if(!$hak) {
		echo ("<meta http-equiv='Refresh' content='1; URL=member_form.php'>");
		echo("
		<script>
		alert('학번을 입력하세요.');
		</script>");
	}
	else if(!$name) {
		echo ("<meta http-equiv='Refresh' content='1; URL=member_form.php'>");
		echo("
		<script>
		alert('이름 입력하세요.');
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

		$query = "insert into member values ('$id','$nick','$pass','$hak','$name')";
		$result = mysql_query($query, $conn);

		mysql_close($conn);

		echo ("<meta http-equiv='Refresh' content='1; URL=index.php'>");
		echo("
		<script>
		alert('회원 가입이 완료되었습니다.');
		</script>");
		
		}
		
	}

?>

 </body>
</html>
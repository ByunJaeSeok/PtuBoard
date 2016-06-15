<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>평택대 게시판</title>
 </head>

 <body>
	<?
		if(!isset($_SESSION))
		{
			session_cache_expire(5);
			session_start();
		}
	?>
	<?
		unset($_SESSION['userid']);
		echo ("<meta http-equiv='Refresh' content='1; URL=index.php'>");
		echo("
		<script>
		alert('로그아웃 되었습니다.');
		</script>");
	?>
 </body>
</html>

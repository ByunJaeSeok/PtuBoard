 <?
     @$conn = mysql_connect("localhost", "root", "autoset");
     mysql_select_db("ptu", $conn);
     mysql_query("set names utf-8");
     $query = "INSERT INTO guestbook (name, pass, content) ";
     $query .= " VALUES ('$_POST[name]', '$_POST[pass]', '$_POST[content]')";
     $result = mysql_query($query, $conn);
 ?>
 <script>
     alert("글이 등록되었습니다.");
     location.href="list.php";
 </script>

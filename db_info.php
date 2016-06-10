<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
 </head>
 <body>
  <?
        @$conn = mysql_connect("localhost", "root", "autoset");
        mysql_select_db("ptu",$conn);
    ?>
 </body>
</html>

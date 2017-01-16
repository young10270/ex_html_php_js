<?php
  require("db.php");
  require("config.php");
  $conn=db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
  $result = mysqli_query($conn,"SELECT * FROM education");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Resume</title>
  </head>
  <body>
    <script>
      password = prompt("비밀번호");
      if(password==1111){
        document.write("안녕하세요 주인님.");
      }
      else {
        location.href="resume.php";
      }
    </script>
  </body>
</html>

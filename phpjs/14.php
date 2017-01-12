<?php
  //DB conn
  $conn = mysqli_connect("localhost","root",'a789624');
  mysqli_select_db($conn,"opentutorials");
  // treat special letters such as ' as normal letters
  // mysqli_real_escape_string
  // defend from attacks
  $name = mysqli_real_escape_string($conn,$_GET['name']);
  $password = mysqli_real_escape_string($conn, $_GET['password']);
  $sql = "SELECT * from user where name = '".$name."'and password='".$password."'";
  $result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>php LogIn</title>
  </head>
  <body>
    <?php
      //if there are right name and password on user table
      if($result->num_rows=="0"){
        echo "뉘신지?";
      }
      else {
        echo "안녕하세요 주인님!";
      }?>
  </body>
</html>

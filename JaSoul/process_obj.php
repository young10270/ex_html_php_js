<?php
  require("db.php");
  require("config.php");
  $conn=db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
  $sql = "SELECT * from objective";
  $result = mysqli_query($conn,$sql);
  if($result->num_rows==0){
    $sql="INSERT INTO objective(description, created) VALUES('".$_POST['obj']."',now())";
    mysqli_query($conn,$sql);
  }
  else{
    $row = mysqli_fetch_assoc($result);
    $sql="UPDATE objective SET description='".$_POST['obj']."' WHERE id=1";
    mysqli_query($conn,$sql);
  }
  header('Location:resume.php');
?>

<?php
  //library -> repetition removal
  require("lib/db.php");
  require("config/config.php");
  //DB conn
  $conn=db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
  $result = mysqli_query($conn,"SELECT * FROM topic");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <!--Css-->
  <link rel="stylesheet" type="text/css" href="http://localhost/style.css">
  <link href="http://localhost/bootstrap-3.3.4-dist/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body id="target">
	<header>
    <img src="http://ddolking.tv/layouts/Dk/img/title.png" alt="왕관">
		<h1><a href = "http://localhost/index_html.php">JavaScript</a></h1>
	</header>
	<nav>
	<ul>
  <?php
    //
    while($row = mysqli_fetch_assoc($result)){
      echo '<li><a href="http://localhost/index_html.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
    }
  ?>
	</ul>
	</nav>

	<div id="control">
		<input type="button" value="white" onclick="document.getElementById('target').className='white'">
		<input type="button" value="black" onclick="document.getElementById('target').className='black'">
    <a href="http://localhost/write.php">쓰기</a>
  </div>
  <article>
    <?php
      if(empty($_GET['id'])==false){
        $sql= 'SELECT topic.id,title,name,description from topic left join user on topic.author=user.id where topic.id='.$_GET['id'];
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        //user input security
        echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
        echo '<p>'.htmlspecialchars($row['name']).'</p>';
        //allow specified tags / deny excluded tags
        echo strip_tags($row['description'],'<a><h1><h2><h3><h4><h5><h6><ol><ul><li>');
      }
    ?>
  </article>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="http://localhost/bootstrap-3.3.4-dist/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
</body>
</html>


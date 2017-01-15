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
  <link rel="stylesheet" type="text/css" href="=/style_BS.css">
  <link href="/bootstrap-3.3.4-dist/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">

  <script>
    UPLOADCARE_PUBLIC_KEY = "a5e307020d58f5703c31";
  </script>
  <script charset="utf-8" src="//ucarecdn.com/libs/widget/2.10.2/uploadcare.full.min.js"></script>
</head>
<body id="target">
  <div class="container">
  	<header class="jumbotron">
      <img src="http://ddolking.tv/layouts/Dk/img/title.png" alt="왕관" id="logo">
  		<h1 class="text-center"><a href = "/index.php">JavaScript</a></h1>
  	</header>
    <!--bootstrap grid-->
    <div class="row">
      <nav class="col-md-2">
    	<ul class="nav nav-pills nav-stacked">
      <?php
        while($row = mysqli_fetch_assoc($result)){
          echo '<li><a href="/index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
        }
      ?>
    	</ul>
    	</nav>
    	<div class="col-md-10">
        <article>
          <form action="process.php" method="post">
            <div class="form-group">
              <label for="form-title"> Title </label>
              <input type="text" class="form-control" name="title" id="form-title" placeholder="제목을 적으세요.">
            </div>
            <div class="form-group">
              <label for="form-author"> Author </label>
              <input type="text" class="form-control" name="author" id="form-author" placeholder="작성자를 적으세요.">
            </div>
            <div class="form-group">
              <label for="form-description"> Description </label>
              <textarea type="text" class="form-control" rows="10" name="description" id="form-description" placeholder="본문을 작성하세요."></textarea>
            </div>

            <input type="hidden" role="uploadcare-uploader" />
            <input class="btn btn-default" type="submit" name="name" id="submit">
          </form>
        </article>
    	</div>
    </div>
  </div>

  <script>
    var singleWidget = uploadcare.singleWidget('[role=uploadcare-uploader]');
    singleWidget.onUPloadComplete(function(info){
      document.getElementById('form-description').value = document.getElementById('form-description').value + '<img crc="'+info.cdnUrl+'">';
    });
  </script>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/bootstrap-3.3.4-dist/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
</body>
</html>


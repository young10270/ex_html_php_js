<?php
  $conn = mysqli_connect("localhost","root",'a789624');
  mysqli_select_db($conn,"opentutorials");
  $result = mysqli_query($conn,"SELECT * FROM topic");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="http://localhost/style.css">
</head>
<body id="target">
	<header>
    <img src="http://ddolking.tv/layouts/Dk/img/title.png" alt="왕관">
		<h1><a href = "http://localhost/index_html.php">JavaScript</a></h1>
	</header>
	<nav>
	<ul>
  <?php
    while($row = mysqli_fetch_assoc($result)){
      echo '<li><a href="http://localhost/index_html.php?id='.$row['id'].'">'.$row['title'].'</a></li>'."\n";
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
    <form action="process.php" method="post">
      <p>
        제목 : <input type="text" name="title">
      </p>
      <p>작성자 : <input type="text" name="author">
      </p>
      <p>
        본문 : <textarea name="description"></textarea>
      </p>
      <input type="submit" name="name">
    </form>
  </article>

</body>
</html>


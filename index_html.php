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
    echo file_get_contents("list.txt")
    ?>
	</ul>
	</nav>

	<div id="control">
		<input type="button" value="white" onclick="document.getElementById('target').className='white'">
		<input type="button" value="black" onclick="document.getElementById('target').className='black'">
	</div>
  <article>
    <?php
    if(empty($_GET['id'])==false){
    echo file_get_contents($_GET['id'].".txt");
  }
    ?>
  </article>

</body>
</html>


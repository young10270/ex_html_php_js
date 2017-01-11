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
      <input type="hidden" role="uploadcare-uploader" />
      <input type="submit" name="name">
    </form>
  </article>
  <script>
    UPLOADCARE_PUBLIC_KEY = "a5e307020d58f5703c31";
  </script>
  <script charset="utf-8" src="//ucarecdn.com/libs/widget/2.10.2/uploadcare.full.min.js"></script>

  <script>
    //role의 값이 uploadcare-uploader인 태그를 업로드 위젯으로 만들어라.
    var singleWidget = uploadcare.singleWidget('[role=uploadcare-uploader]');
    //그 위젯을 통해서 업로드가 끝났을 떄
    singleWidget.onUploadComplete(function(info){
      //id 값이 description인 태그의 값 뒤에 업로드한 이미지 파일의 주소를 이미지 태그와 함께 첨부해라.
      document.getElementById('description').value = document.getElementById('description').value + '<img src ="'+info.cdnUrl+'">';
    });
  </script>

</body>
</html>


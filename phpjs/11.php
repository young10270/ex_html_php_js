<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Array&Recursive</title>
  </head>
  <body>
    <h1>JavaScript</h1>
    <ul>
    <script>
      list = new Array("최진혁","최유빈","한아람","한이은");
      i=0;
      while(i<list.length){
        document.write("<li>"+list[i]+"</li>");
        i++;
      }
    </script>
    </ul>
    <h1>PHP</h1>
    <ul>
    <?php
      $list = array("최진혁","최유빈","이고잉","한아람","한이은");
      $i=0;
      while($i<count($list)){
        echo "<li>".$list[$i]."</li>";
        $i++;
      }
    ?>
    </ul>
  </body>
</html>

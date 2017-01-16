<?php
  require("db.php");
  require("config.php");
  $conn=db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
  //table을 하나만 쓰는게 아니니까 일단은 select하지 않음
  //$result = mysqli_query($conn,"SELECT * FROM table");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"><!--for bootstrap-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JayoungKim_Resume</title>
    <link href="../bootstrap-3.3.4-dist/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="container">
      <header class="jumbotron">
        <img id="mLogo1" src="http://cafeptthumb1.phinf.naver.net/MjAxNzAxMTNfMTM4/MDAxNDg0MjQxNTMxNjU3.kvNsQEPD1OMOHy4d1kVRs4lOJhZ7ITbX0PvxwhD99Akg.I1AGhBYoQG1HAsG0gnYiDJ0MbKqSPesOIXr93DxHt_wg.JPEG.young10270/julie_1.jpg?type=w740" alt="julie_1">
        <img id="mLogo2" src="http://cafeptthumb4.phinf.naver.net/MjAxNzAxMTNfMzUg/MDAxNDg0MjQxNTMyMDQ1.O0Wi72tNH5dkzy0BaiOIQ5zurQCU8SI0JFVJAbFfqBAg.2PUJWPVgXOzORHJo2Xm39zn1s5pJGdLQrvk_YSkSA7Qg.JPEG.young10270/julie_2.jpg?type=w740" alt="julie_2">
        <h1><a href="home.php">Ja</a></h1>
        <h2><a href="home.php"> Soul Young </a></h1>
      </header>
      <div class="hInfo">
        <?php
        $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user"));
        echo '<h1 class="name">'.htmlspecialchars($row['name']).'</h1>';
        echo '<ol class="bInfo">
        <li>'.htmlspecialchars($row['address']).'</li>
        <li>'.htmlspecialchars($row['phone']).'</li>
        <li>'.htmlspecialchars($row['email']).'</li>
        <li>'."Skype ID : ".htmlspecialchars($row['skype']).'</li>
        <li>'."github : ".htmlspecialchars($row['github']).'</li>
        </ol>'
        ?>
      </div>
      <div class="obj">
        <h3>Objective</h3>
        <a class="btn btn-success" href="edit_obj.php">Edit</a>
        <?php
        $result=mysqli_query($conn,"SELECT * FROM objective");
        if($result->num_rows!='0'){
          while($row=mysqli_fetch_assoc($result)){
            echo '<ul><li>'.htmlspecialchars($row['description']).'</li></ul>';
          }
        }
        ?>
      </div>
      <div class="obj">
        <h3>Summary of Qualifications</h3>
        <a class="btn btn-success" href="edit_qfc.php">Edit</a>
        <?php
        $result=mysqli_query($conn,"SELECT * FROM qualification");
        if($result->num_rows!='0'){
          while($row=mysqli_fetch_assoc($result)){
            echo '<ul><li>'.htmlspecialchars($row['description']).'</li></ul>';
          }
        }
        ?>
      </div>
      <div class="obj">
        <h3>Education</h3>
        <a class="btn btn-success" href="edit_edu.php">Edit</a>
        <?php
        $result=mysqli_query($conn,"SELECT * FROM education");
        if($result->num_rows=="0"){
          while($row=mysqli_fetch_assoc($result)){
            echo '<h5>'.htmlspecialchars($row['school']).'"("'.htmlspecialchars($row['area']).'")\nMaforing in "'.
            htmlspecialchars($row['major']).'<div style="text-align:right">'.htmlspecialchars($row['period']).'</div>'.
            '"\nCumulative GPA : "'.htmlspecialchars($row['gpa']).'<li>"Relevent Course Work\n\t"'.htmlspecialchars($row['description']);
          }
        }
        ?>
      </div>
      <div class="obj">
        <h3>Related Experiences</h3>
        <a class="btn btn-success" href="edit_exp.php">Edit</a>
        <?php
        $result=mysqli_query($conn,"SELECT * FROM experience");
        if($result->num_rows=="0"){
          $row=mysqli_fetch_assoc($result);
          echo $row['description'];
        }
        ?>
      </div>
      <div class="obj">
        <h3>Volunteer Experiences</h3>
        <a class="btn btn-success" href="edit_vol.php">Edit</a>
        <?php
        $result=mysqli_query($conn,"SELECT * FROM volunteer");
        if($result->num_rows=="0"){
          $row=mysqli_fetch_assoc($result);
          echo $row['description'];
        }
        ?>
      </div>
      <div class="obj">
        <h3>Hobbies & Interests</h3>
        <a class="btn btn-success" href="edit_itr.php">Edit</a>
        <?php
        $result=mysqli_query($conn,"SELECT * FROM interest");
        if($result->num_rows=="0"){
          $row=mysqli_fetch_assoc($result);
          echo $row['description'];
        }
        ?>
      </div>

    </div>

    <!--for bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap-3.3.4-dist/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
  </body>
</html>

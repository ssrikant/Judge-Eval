<!DOCTYPE html>
<?php
  session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1){ ?>
<html>
<head>
  <div class="logout">
      <a href="slogout.php">Logout</a> </br>
  </div>
  <div class="dashback">
      <a href="sdashboard.php">Back to Dashboard</a> </br>
  </div>
  <p>
  <center><img src= "missionlogo.png" alt="Mission" align="middle" style="width:80%;height:228px;"></center>
  </p>
</head>

<body>
  <?php

      $details = simplexml_load_file("SDD.xml") or die("Please upload a csv file to view the sessions.");
      $size = sizeof($details->team);//# of total teams
      $j = 1;
      $s[0] = $details->team[0]->Session;
      $index[0] = 0;
      for($i = 1; $i < $size-1; $i++){
          if(strcmp($details->team[$i]->Session, $details->team[$i-1]->Session) != 0){
                  $s[$j] = $details->team[$i]->Session;//$s holds all the sessions
              $index[$j] = $i;//holds the indexes where the sessions is found
              $j++;
          }
      }
      $index[$j] = $i;
  ?>
<p>
    <h1> Choose a Session: </h1>
    <?php
          for($i = 0, $j = 1; $i < sizeof($index)-1; $i++, $j++){
                  echo "<a href = 'session.php?session=$j'>$s[$i]</a> <br/>";
          }
    ?>
</p>
</body>
<style>
head,body{
  font-family: "Helvetica Neue";
  background-color: rgb(221,221,212);
}
div.logout{
  float:right;
}
div.dashback{
  float:left;
}
img{
  float:center;
}
</style>
</html>
<?php }
else{
	echo "Please log in to view this information. Redirecting...";
    echo "<script> setTimeout(function(){ window.location.href = 'slogin.php';}, 1000); </script>";
}
?>

<!DOCTYPE html>
<?php
  session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1){ ?>
<html>
<a href="sdashboard.php">Back to homepage!</a> <br/>
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
    Choose a Session: </br>
    <?php
          for($i = 0, $j = 1; $i < sizeof($index)-1; $i++, $j++){
                  echo "<a href = 'session.php?session=$j'>$s[$i]</a> <br/>";
          }
    ?>
  <a href="index.php">Logout</a> </br>
</p>
</body>
</html>
<?php } ?>

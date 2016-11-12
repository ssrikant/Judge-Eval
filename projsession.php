<!DOCTYPE html>
<?php
  session_start();

  $details = simplexml_load_file("SDD.xml") or die("Error: Cannot create object");
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

<html>
  <body>
  <a href = "csvtoxml.php"><button> Add CSV</button></a><br>
  <?php if(isset($_GET["added"])){ if($_GET["added"] == 1){echo "Added CSV<br>";}} ?>
  Choose a session!<br/>
  <?php
        for($i = 0, $j = 1; $i < sizeof($index)-1; $i++, $j++){
                echo "<a href = 'session.php?session=$j'>$s[$i]</a> <br/>";
    }
        ?>

<br/>
  <a href="slogout.php">Logout</a> <br/>
  </body>
</html>

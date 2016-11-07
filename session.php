<?php
session_start();
    
    if (isset($_GET['session'])) {
        $sn = $_GET['session'] - 1;
        $ss = $_GET['session'];
    }
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
    
    $tn = $index[$sn+1]-$index[$sn];
    
    $session = $s[$sn];
    $sessionName = $details->team[$index[$sn]]->Category;
    
    $j = 0;
    for($i = $index[$sn]; $i < $index[$sn+1]; $i++){
    	
        for($k = 0; $k < $details->team[$i]->EngineeringSeniors; $k++){
        	if($k == 0){
    			$students[$i][$k] = $details->team[$i]->First1 . " " . $details->team[$i]->Last1;
                continue;
            }
            if($k == 1){
    			$students[$i][$k] = $details->team[$i]->First2 . " " . $details->team[$i]->Last2;
                continue;
            }
            if($k == 2){
    			$students[$i][$k] = $details->team[$i]->First3 . " " . $details->team[$i]->Last3;
                continue;
            }
            if($k == 3){
    			$students[$i][$k] = $details->team[$i]->First4 . " " . $details->team[$i]->Last4;
                continue;
            }
            if($k == 4){
    			$students[$i][$k] = $details->team[$i]->First5 . " " . $details->team[$i]->Last5;
                continue;
            }
            if($k == 5){
    			$students[$i][$k] = $details->team[$i]->First6 . " " . $details->team[$i]->Last6;
            }
        }
        
        $advisor[$i][0] = $details->team[$i]->Faculty1;
        if(strcmp($details->team[$i]->Faculty2, '') != 0){
        	$advisor[$i][1] = $details->team[$i]->Faculty2;
        }
        
        $room[$i] = $details->team[$i]->Location;
        
        $j++;
    }
	
?>

<!DOCTYPE html>

<html>
  <h1>
    <?php echo "$session"; ?>
  </h1>
  <body>
  	  <a href="projsession.php">Back</a> <br/>
      <?php
      	for($t = 0; $t < $tn; $t++){
            //$t = $i - $index[$sn];
      ?>
      <p>
        Team <?php echo $t+1 . ": ";
        	for($k = 0; $k < $details->team[$t + $index[$sn]]->EngineeringSeniors; $k++){
            	if($k == $details->team[$t + $index[$sn]]->EngineeringSeniors-1){
            		echo $students[$t + $index[$sn]][$k];
                }
                else{
            		echo $students[$t + $index[$sn]][$k] . ", ";
                }
            } ?> <br/>
      <table style = "width:75%", border="1px, solid black">
        <thead>
        <tr>
          <th>&nbsp </th><?php $judgeNum = sizeof($details->team[$t + $index[$sn]]->forms);
          						for($i = 0, $j = 1; $i < $judgeNum; $i++, $j++){ ?>
          <?php echo "<th>Judge $j</th>"; }?>
          <th>Average Score</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Total Scores</td>
          <?php $judgeNum = sizeof($details->team[$t + $index[$sn]]->forms);
          		for($i = 0; $i < $judgeNum; $i++){ ?>
          <?php echo "<td>";
            if(isset($details->team[$t + $index[$sn]]->forms[$i])){
            	echo $details->team[$t + $index[$sn]]->forms[$i]->Total;
            }
            else{
            	echo '---';
            }
            echo "<br/></td>"; }?>
          <td><?php
            $k = 0;
            for($i = 0; $i < sizeof($details->team[$t + $index[$sn]]->forms); $i++){
            	$k += $details->team[$t + $index[$sn]]->forms[$i]->Total;
            }
            if(sizeof($details->team[$t + $index[$sn]]->forms) >= 1){
            	echo ($k/sizeof($details->team[$t + $index[$sn]]->forms));
            }
            else{
            	echo '';
            }?>
            <br/></td>
        </tr>
      </tbody>
      </table>
    </p>
<?php } ?>

    <div class = "reports">
        <h2>
          Click on view button to obtain an printable evaluation report for each team. <br/>
        </h2>
        <?php
        for($i = 0, $j = 1; $i < $tn; $i++, $j++){
            echo "<a href='convert.php?team=$j&session=$ss'><button>  View Team $j </button></a><br>";

        }
        ?>
    </div>
<div><br/>
  <a href="index.php">Logout</a> <br/>
</div>
  </body>

</html>

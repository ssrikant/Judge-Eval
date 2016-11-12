<?php
session_start();
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1){

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

        $title[$i] = $details->team[$i]->Title;

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
<head>
</head>
  <h1>
    <?php echo "$session"; ?>
  </h1>
  <body>
  	  <a href="sdashboard.php">Back</a> <br/>
      <?php
      	for($t = 0; $t < $tn; $t++){
            //$t = $i - $index[$sn];
      ?>
      <p>
        Team <?php echo $t+1 . ": ";
        	echo $title[$t] . "<br>";
            echo "Members: ";
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
        </tr>
      </thead>
      <tbody>
      	<tr>
          <td>Technical Accuracy</td>
          	<?php $judgeNum = sizeof($details->team[$t + $index[$sn]]->forms);
          		for($i = 0; $i < $judgeNum; $i++){
          			echo "<td align='center'>";
            		if(isset($details->team[$t + $index[$sn]]->forms[$i])){
            			echo $details->team[$t + $index[$sn]]->forms[$i]->TechnicalAccuracy;
            		}
           		 else{
            			echo '---';
           		 }
       		     echo "<br/></td>";
        	}?>
        </tr>
        <tr>
          <td>Creativity and Innovation</td>
          	<?php $judgeNum = sizeof($details->team[$t + $index[$sn]]->forms);
          		for($i = 0; $i < $judgeNum; $i++){
          			echo "<td align='center'>";
            		if(isset($details->team[$t + $index[$sn]]->forms[$i])){
            			echo $details->team[$t + $index[$sn]]->forms[$i]->CreativityandInnovation;
            		}
           		 else{
            			echo '---';
           		 }
       		     echo "<br/></td>";
        	}?>
        </tr>
        <tr>
          <td>Supporting Analytical Work</td>
          	<?php $judgeNum = sizeof($details->team[$t + $index[$sn]]->forms);
          		for($i = 0; $i < $judgeNum; $i++){
          			echo "<td align='center'>";
            		if(isset($details->team[$t + $index[$sn]]->forms[$i])){
            			echo $details->team[$t + $index[$sn]]->forms[$i]->SupportingAnalyticalWork;
            		}
           		 else{
            			echo '---';
           		 }
       		     echo "<br/></td>";
        	}?>
        </tr>
        <tr>
          <td>Methodical Design Process Demonstrated</td>
          	<?php $judgeNum = sizeof($details->team[$t + $index[$sn]]->forms);
          		for($i = 0; $i < $judgeNum; $i++){
          			echo "<td align='center'>";
            		if(isset($details->team[$t + $index[$sn]]->forms[$i])){
            			echo $details->team[$t + $index[$sn]]->forms[$i]->MethodicalDesignProcessDemonstrated;
            		}
           		 else{
            			echo '---';
           		 }
       		     echo "<br/></td>";
        	}?>
        </tr>
        <tr>
          <td>Addresses Project Complexity Appropriately</td>
          	<?php $judgeNum = sizeof($details->team[$t + $index[$sn]]->forms);
          		for($i = 0; $i < $judgeNum; $i++){
          			echo "<td align='center'>";
            		if(isset($details->team[$t + $index[$sn]]->forms[$i])){
            			echo $details->team[$t + $index[$sn]]->forms[$i]->AddressesProjectComplexityAppropriately;
            		}
           		 else{
            			echo '---';
           		 }
       		     echo "<br/></td>";
        	}?>
        </tr>
        <tr>
          <td>Expectation of Completion (by term's end)</td>
          	<?php $judgeNum = sizeof($details->team[$t + $index[$sn]]->forms);
          		for($i = 0; $i < $judgeNum; $i++){
          			echo "<td align='center'>";
            		if(isset($details->team[$t + $index[$sn]]->forms[$i])){
            			echo $details->team[$t + $index[$sn]]->forms[$i]->ExpectationofCompletion;
            		}
           		 else{
            			echo '---';
           		 }
       		     echo "<br/></td>";
        	}?>
        </tr>
        <tr>
          <td>Design and Analysis of tests</td>
          	<?php $judgeNum = sizeof($details->team[$t + $index[$sn]]->forms);
          		for($i = 0; $i < $judgeNum; $i++){
          			echo "<td align='center'>";
            		if(isset($details->team[$t + $index[$sn]]->forms[$i])){
            			echo $details->team[$t + $index[$sn]]->forms[$i]->DesignandAnalysisoftests;
            		}
           		 else{
            			echo '---';
           		 }
       		     echo "<br/></td>";
        	}?>
        </tr>
        <tr>
          <td>Quality of Response during Q & A</td>
          	<?php $judgeNum = sizeof($details->team[$t + $index[$sn]]->forms);
          		for($i = 0; $i < $judgeNum; $i++){
          			echo "<td align='center'>";
            		if(isset($details->team[$t + $index[$sn]]->forms[$i])){
            			echo $details->team[$t + $index[$sn]]->forms[$i]->QualityofResponseduringQA;
            		}
           		 else{
            			echo '---';
           		 }
       		     echo "<br/></td>";
        	}?>
        </tr>
        <tr>
          <td>Organization</td>
          	<?php $judgeNum = sizeof($details->team[$t + $index[$sn]]->forms);
          		for($i = 0; $i < $judgeNum; $i++){
          			echo "<td align='center'>";
            		if(isset($details->team[$t + $index[$sn]]->forms[$i])){
            			echo $details->team[$t + $index[$sn]]->forms[$i]->Organization;
            		}
           		 else{
            			echo '---';
           		 }
       		     echo "<br/></td>";
        	}?>
        </tr>
        <tr>
          <td>Use of Alloted Time</td>
          	<?php $judgeNum = sizeof($details->team[$t + $index[$sn]]->forms);
          		for($i = 0; $i < $judgeNum; $i++){
          			echo "<td align='center'>";
            		if(isset($details->team[$t + $index[$sn]]->forms[$i])){
            			echo $details->team[$t + $index[$sn]]->forms[$i]->UseofAllotedTime;
            		}
           		 else{
            			echo '---';
           		 }
       		     echo "<br/></td>";
        	}?>
        </tr>
        <tr>
          <td>Visual Aids</td>
          	<?php $judgeNum = sizeof($details->team[$t + $index[$sn]]->forms);
          		for($i = 0; $i < $judgeNum; $i++){
          			echo "<td align='center'>";
            		if(isset($details->team[$t + $index[$sn]]->forms[$i])){
            			echo $details->team[$t + $index[$sn]]->forms[$i]->VisualAids;
            		}
           		 else{
            			echo '---';
           		 }
       		     echo "<br/></td>";
        	}?>
        </tr>
        <tr>
          <td>Confidence and Poise</td>
          	<?php $judgeNum = sizeof($details->team[$t + $index[$sn]]->forms);
          		for($i = 0; $i < $judgeNum; $i++){
          			echo "<td align='center'>";
            		if(isset($details->team[$t + $index[$sn]]->forms[$i])){
            			echo $details->team[$t + $index[$sn]]->forms[$i]->ConfidenceandPoise;
            		}
           		 else{
            			echo '---';
           		 }
       		     echo "<br/></td>";
        	}?>
        </tr>
        <tr>
          <td>Total Score</td>
          	<?php $judgeNum = sizeof($details->team[$t + $index[$sn]]->forms);
          		for($i = 0; $i < $judgeNum; $i++){
          			echo "<td align='center'>";
            		if(isset($details->team[$t + $index[$sn]]->forms[$i])){
            			echo $details->team[$t + $index[$sn]]->forms[$i]->Total;
            		}
           		 else{
            			echo '---';
           		 }
       		     echo "<br/></td>";
        	}?>
        </tr>
        <tr>
          <td>Raw Total</td>
          	<?php
            	$judgeNum = sizeof($details->team[$t + $index[$sn]]->forms);
                $l = 0;
                echo "<td  align='center' colspan='3'>";
          		for($i = 0; $i < $judgeNum; $i++){
            		if(isset($details->team[$t + $index[$sn]]->forms[$i])){
                        $l += $details->team[$t + $index[$sn]]->forms[$i]->Total;
            		}
           		 else{
            			echo '---';
           		 }}
                 if($l > 0){
                 	echo $l;
                 }
       		     echo "<br/></td>";
        	?>
        </tr>
        <tr>
          <td>Average Score</td>
          	<?php
            echo "<td  align='center' colspan='3'>";
            $k = 0;
            for($i = 0; $i < sizeof($details->team[$t + $index[$sn]]->forms); $i++){
            	$k += $details->team[$t + $index[$sn]]->forms[$i]->Total;
            }
            if(sizeof($details->team[$t + $index[$sn]]->forms) >= 1){
            	echo round(($k/sizeof($details->team[$t + $index[$sn]]->forms)), 2);
            }
            else{
            	echo '';
            }
            echo "<br/></td>";
            ?>
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
<?php } ?>

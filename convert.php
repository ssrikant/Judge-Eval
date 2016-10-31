 <!DOCTYPE html>
 <?php
 session_start()
 ?>
 <html>
 <head>
 <title>Report</title>
 </head>
 <body>
<?php
	if (isset($_GET['team']) && isset($_GET['session'])) {
    	$tn = $_GET['team'] - 1;
        $sn = $_GET['session'] - 1;
    	$details = simplexml_load_file("seniordesigndetails.xml") or die("Error: Cannot create object");
        $s = $details->session[$sn]->team[$tn];
    	$title = $s->title;
    	$student = $s->members;
    	$advisor = $s->advisor;
    	$room = $s->room;
    	$sessionNumber = $s->sessionNumber;
        $f = $s->forms;
        echo '<button style="height:50px; width:100px; font-size: 150%;" onclick="window.print();">Print</button>';
        echo '<br><a href="projsession.php" onclick="window.history.back();">Back</a> <br><hr>';

        for($i = 0; $i < sizeof($f); $i++){
    		$JN = $f[$i]->JudgeName;
    		$TA = $f[$i]->TechnicalAccuracy;
    		$CI = $f[$i]->CreativityandInnovation;
    		$SAW = $f[$i]->SupportingAnalyticalWork;
    		$MDPD = $f[$i]->MethodicalDesignProcessDemonstrated;
    		$APCA = $f[$i]->AddressesProjectComplexityAppropriately;
    		$EC = $f[$i]->ExpectationofCompletion;
    		$DA = $f[$i]->DesignandAnalysisoftests;
    		$QR = $f[$i]->QualityofResponseduringQA;
    		$O = $f[$i]->Organization;
    		$UAT = $f[$i]->UseofAllotedTime;
    		$VA = $f[$i]->VisualAids;
    		$CP = $f[$i]->ConfidenceandPoise;
    		$total = $f[$i]->Total;
    		$Eco = $f[$i]->Economic;
    		$Env = $f[$i]->Environmental;
    		$Sus = $f[$i]->Sustainability;
    		$Man = $f[$i]->Manufacturability;
    		$Eth = $f[$i]->Ethical;
    		$HaS = $f[$i]->HealthandSafety;
    		$Soc = $f[$i]->Social;
    		$Pol = $f[$i]->Political;
    		$Com = $f[$i]->Comments;
        
        	echo "<p>Project Title: $title</p>";
        	echo "<p>Group Members: $student</p>";
        	echo "<p>Session: $sessionNumber</p>";
        	echo "<p>Room: $room</p>";
        	echo "<p>Judge Name: $JN</p>";
        	echo "<p>Advisor: $advisor</p>";
        	echo "<p>DESIGN PROJECT<br>";
        	echo "A. Technical Accuracy: $TA<br>";
        	echo "B. Creativity and Innovation: $CI<br>";
        	echo "C. Supporting Analytical Work: $SAW<br>";
        	echo "D. Methodical Design Process Demonstrated: $MDPD<br>";
        	echo "E. Addresses Project Complexity Appropriately: $APCA<br>";
        	echo "F. Expectation of Completion (by term's end): $EC<br>";
        	echo "G. Design and Analysis of tests: $DA<br>";
        	echo "H. Quality of Response during Q & A: $QR<br></p>";
			echo "<p>PRESENTATION<br>";
        	echo "A. Organization: $O<br>";
        	echo "B. Use of Alloted Time: $UAT<br>";
        	echo "C. Visual Aids: $VA<br>";
        	echo "D. Confidence and Poise: $CP<br></p>";
            echo "GRAND TOTAL: $total Points<br>";
        	echo "<br>CONSIDERATIONS<br>";
        	if($Eco == 1){
        		echo "<input type='checkbox' checked disabled>Economic<br>";
        	}
        	else{
        		echo "<input type='checkbox' disabled>Economic<br>";
        	}
        	if($Env == 1){
        		echo "<input type='checkbox' checked disabled>Environmental<br>";
        	}
        	else{
       		 	echo "<input type='checkbox' disabled>Environmental<br>";
        	}
        	if($Sus == 1){
        		echo "<input type='checkbox' checked disabled>Sustainability<br>";
        	}
        	else{
        		echo "<input type='checkbox' disabled>Sustainability<br>";
        	}
        	if($Man == 1){
        		echo "<input type='checkbox' checked disabled>Manufacturability<br>";
        	}
        	else{
        		echo "<input type='checkbox' disabled>Manufacturability<br>";
        	}
        	if($Eth == 1){
        		echo "<input type='checkbox' checked disabled>Ethical<br>";
        	}
        	else{
        		echo "<input type='checkbox' disabled>Ethical<br>";
        	}
        	if($HaS == 1){
        		echo "<input type='checkbox' checked disabled>Health and Safety<br>";
        	}
        	else{
        		echo "<input type='checkbox' disabled>Health and Safety<br>";
        	}
        	if($Soc == 1){
        		echo "<input type='checkbox' checked disabled>Social<br>";
        	}
        	else{
        		echo "<input type='checkbox' disabled>Social<br>";
        	}
        	if($Pol == 1){
        		echo "<input type='checkbox' checked disabled>Political<br>";
        	}
        	else{
        		echo "<input type='checkbox' disabled>Political<br>";
        	}
        	echo "<br>COMMENTS<br>";
        	echo "$Com<br>";
            echo "<hr style='page-break-after: always;'>";
    	}
	}
    else{
    	echo "Stop messing with the url...";
    }
?>


</body>
</html>

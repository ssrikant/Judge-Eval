 <!DOCTYPE html>
 <?php
 session_save_path("sessions");
 session_start();
 if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1){
 
 ?>
 <html>
 <head>
 <title>Report</title>
 </head>
 <body>
<?php
	if (isset($_GET['team']) && isset($_GET['session'])) {
    	$t = $_GET['team'] - 1;
        $sn = $_GET['session'] - 1;
        
        
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
    
    	$te = $index[$sn] + $t;//number of teams in the session
        
    	$title = $details->team[$te]->Title;
    
    	for($k = 0; $k < $details->team[$te]->EngineeringSeniors; $k++){
    	    if($k == 0){
    	        $students[$k] = $details->team[$te]->First1 . " " . $details->team[$te]->Last1;
    	        continue;
    	    }
    	    if($k == 1){
    	        $students[$k] = $details->team[$te]->First2 . " " . $details->team[$te]->Last2;
    	        continue;
    	    }
    	    if($k == 2){
    	        $students[$k] = $details->team[$te]->First3 . " " . $details->team[$te]->Last3;
    	        continue;
    	    }
    	    if($k == 3){
    	        $students[$k] = $details->team[$te]->First4 . " " . $details->team[$te]->Last4;
    	        continue;
    	    }
    	    if($k == 4){
    	        $students[$k] = $details->team[$te]->First5 . " " . $details->team[$te]->Last5;
    	        continue;
    	    }
    	    if($k == 5){
    	        $students[$k] = $details->team[$te]->First6 . " " . $details->team[$te]->Last6;
    	    }
    	}
    
    	$session = $details->team[$te]->Session;
    	
    	$room = $details->team[$te]->Location;
	
		$advisor[0] = $details->team[$te]->Faculty1;
	    if(strcmp($details->team[$te]->Faculty2, '') != 0){
	        $advisor[1] = $details->team[$te]->Faculty2;
	    }
        
    	$f = $details->team[$te]->forms;

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
    		$Com = filter_var($f[$i]->Comments, FILTER_SANITIZE_STRING);
        
        	echo "<p>Project Title: $title</p>";
        	echo "<p>Group Members: ";
        	for($k = 0; $k < $details->team[$te]->EngineeringSeniors; $k++){
                if($k == $details->team[$te]->EngineeringSeniors-1){
                    echo $students[$k];
                }
                else{
                    echo $students[$k] . ", ";
                }
            };
        	echo "</p><p>Session: $session</p>";
        	echo "<p>Room: $room</p>";
        	echo "<p>Advisor: ";
            if(sizeof($advisor) == 1){
            	echo $advisor[0];
            }
            else{
            	echo $advisor[0] . ", " . $advisor[1];
            }
        	echo "<p>Judge Name: $JN</p>";
        	echo "</p><p>DESIGN PROJECT<br>";
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
    	echo "Error: Unknown url";
    }
?>


</body>
</html>

<?php
}
else{
	echo "Please log in to view this information. Redirecting...";
    echo "<script> setTimeout(function(){ window.location.href = 'slogin.php';}, 1000); </script>";
}

?>

 <!DOCTYPE html>
 <?php
 session_start();
 if($_SESSION['judge'] == 1){
 ?>
 <html>
 <head>
 <title>Please confirm</title>
 </head>
 <body>
<?php
	if(isset($_POST["JN"])){
	$_SESSION['JN'] = $_POST["JN"];
    $_SESSION['TA'] = $_POST["TA"];
    $_SESSION['CI'] = $_POST["CI"];
    $_SESSION['SAW'] = $_POST["SAW"];
    $_SESSION['MDPD'] = $_POST["MDPD"];
    $_SESSION['APCA'] = $_POST["APCA"];
    $_SESSION['EC'] = $_POST["EC"];
    $_SESSION['DA'] = $_POST["DA"];
    $_SESSION['QR'] = $_POST["R"];
    $_SESSION['O'] = $_POST["O"];
    $_SESSION['UAT'] = $_POST["UAT"];
    $_SESSION['VA'] = $_POST["VA"];
    $_SESSION['CP'] = $_POST["CP"];
    if(isset($_POST['Ec'])){
    	$_SESSION['Eco'] = 1;
    }
    else{
    	$_SESSION['Eco'] = 0;
    }
    if(isset($_POST['En'])){
    	$_SESSION['Env'] = 1;
    }
    else{
    	$_SESSION['Env'] = 0;
    }
    if(isset($_POST['Su'])){
    	$_SESSION['Sus'] = 1;
    }
    else{
    	$_SESSION['Sus'] = 0;
    }
    if(isset($_POST['Ma'])){
    	$_SESSION['Man'] = 1;
	}
    else{
    	$_SESSION['Man'] = 0;
    }
    if(isset($_POST['Et'])){
    	$_SESSION['Eth'] = 1;
	}
    else{
    	$_SESSION['Eth'] = 0;
    }
    if(isset($_POST['HS'])){
    	$_SESSION['HaS'] = 1;
    }
    else{
    	$_SESSION['HaS'] = 0;
    }
    if(isset($_POST['So'])){
    	$_SESSION['Soc'] = 1;
	}
    else{
    	$_SESSION['Soc'] = 0;
    }
    if(isset($_POST['Po'])){
    	$_SESSION['Pol'] = 1;
    }
    else{
    	$_SESSION['Pol'] = 0;
    }
    
    if(isset($_POST['Com'])){
    	$_SESSION['Com'] = $_POST['Com'];
    }
    else{
    	$_SESSION['Com'] = 'None';
    }
	}
	if(isset($_GET['yes'])){
    	$confirmation = $_GET['yes'];
    }
    else{
    	$confirmation = 0;
    }
    
	if($confirmation == 1){
    $tn = $_SESSION["teamNum"];
	$JN = $_SESSION["JN"];
    $TA = $_SESSION["TA"];
    $CI = $_SESSION["CI"];
    $SAW = $_SESSION["SAW"];
    $MDPD = $_SESSION["MDPD"];
    $APCA = $_SESSION["APCA"];
    $EC = $_SESSION["EC"];
    $DA = $_SESSION["DA"];
    $QR = $_SESSION["QR"];
    $O = $_SESSION["O"];
    $UAT = $_SESSION["UAT"];
    $VA = $_SESSION["VA"];
    $CP = $_SESSION["CP"];
    $total = $TA + $CI + $SAW + $MDPD + $APCA + $EC + $DA + $QR + $O + $UAT + $VA + $CP;
    
    $Eco = $_SESSION['Eco'];
    $Env = $_SESSION['Env'];
    $Sus = $_SESSION['Sus'];
    $Man = $_SESSION['Man'];
    $Eth = $_SESSION['Eth'];
    $HaS = $_SESSION['HaS'];
    $Soc = $_SESSION['Soc'];
    $Pol = $_SESSION['Pol'];
    $Com = $_SESSION['Com'];
    
	$xml = new DOMDocument('1.0', 'utf-8');
	$xml->formatOutput = true;
	$xml->preserveWhiteSpace = false;
	$xml->load('SDD.xml');

	$element = $xml->getElementsByTagName('team')[$tn];//edit this to change where for is saved
	$newItem = $xml->createElement('forms');
	
    $newItem->appendChild($xml->createElement('JudgeName', $JN));
    $newItem->appendChild($xml->createElement('TechnicalAccuracy', $TA));
	$newItem->appendChild($xml->createElement('CreativityandInnovation', $CI));
	$newItem->appendChild($xml->createElement('SupportingAnalyticalWork', $SAW));
	$newItem->appendChild($xml->createElement('MethodicalDesignProcessDemonstrated', $MDPD));
	$newItem->appendChild($xml->createElement('AddressesProjectComplexityAppropriately', $APCA));
    $newItem->appendChild($xml->createElement('ExpectationofCompletion', $EC));
	$newItem->appendChild($xml->createElement('DesignandAnalysisoftests', $DA));
	$newItem->appendChild($xml->createElement('QualityofResponseduringQA', $QR));
	$newItem->appendChild($xml->createElement('Organization', $O));
	$newItem->appendChild($xml->createElement('UseofAllotedTime', $UAT));
	$newItem->appendChild($xml->createElement('VisualAids', $VA));
	$newItem->appendChild($xml->createElement('ConfidenceandPoise', $CP));
	$newItem->appendChild($xml->createElement('Total', $total));
    
    $newItem->appendChild($xml->createElement('Economic', $Eco));
    $newItem->appendChild($xml->createElement('Environmental', $Env));
    $newItem->appendChild($xml->createElement('Sustainability', $Sus));
    $newItem->appendChild($xml->createElement('Manufacturability', $Man));
    $newItem->appendChild($xml->createElement('Ethical', $Eth));
    $newItem->appendChild($xml->createElement('HealthandSafety', $HaS));
    $newItem->appendChild($xml->createElement('Social', $Soc));
    $newItem->appendChild($xml->createElement('Political', $Pol));
    
	$newItem->appendChild($xml->createElement('Comments', $Com));
    
	$element->appendChild($newItem);

	$xml->save('SDD.xml');
	
    $_SESSION['PIN'] = -1;
	echo "Data has been written. You will automatically logout now.";
	echo "<script> setTimeout(function(){ window.location.href = 'slogout.php';}, 1000); </script>";
    }
    else{
    	echo "Are you sure you want to submit the form? No more edits will be allowed after you press Yes.<br>";
        echo "<a href = confirm.php?yes=1><button>Yes</button></a>";
        echo "<button onclick='window.history.back()'>No</button>";
    }
?>


</body>
</html>
<?php
}
else{
	echo "Please log in to view this information. Redirecting...";
    echo "<script> setTimeout(function(){ window.location.href = 'judgelogin.php';}, 1000); </script>";
}
?>

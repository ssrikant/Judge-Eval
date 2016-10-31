 <!DOCTYPE html>
 <?php
 session_start()
 ?>
 <html>
 <head>
 <title>Please confirm</title>
 </head>
 <body>
<?php
	$JN = $_POST["JN"];
    $TA = $_POST["TA"];
    $CI = $_POST["CI"];
    $SAW = $_POST["SAW"];
    $MDPD = $_POST["MDPD"];
    $APCA = $_POST["APCA"];
    $EC = $_POST["EC"];
    $DA = $_POST["DA"];
    $QR = $_POST["R"];
    $O = $_POST["O"];
    $UAT = $_POST["UAT"];
    $VA = $_POST["VA"];
    $CP = $_POST["CP"];
    $total = $TA + $CI + $SAW + $MDPD + $APCA + $EC + $DA + $QR + $O + $UAT + $VA + $CP;
    if(isset($_POST['Ec'])){
    	$Eco = 1;
    }
    else{
    	$Eco = 0;
    }
    if(isset($_POST['En'])){
    	$Env = 1;
    }
    else{
    	$Env = 0;
    }
    if(isset($_POST['Su'])){
    	$Sus = 1;
    }
    else{
    	$Sus = 0;
    }
    if(isset($_POST['Ma'])){
    	$Man = 1;
	}
    else{
    	$Man = 0;
    }
    if(isset($_POST['Et'])){
    	$Eth = 1;
	}
    else{
    	$Eth = 0;
    }
    if(isset($_POST['HS'])){
    	$HaS = 1;
    }
    else{
    	$HaS = 0;
    }
    if(isset($_POST['So'])){
    	$Soc = 1;
	}
    else{
    	$Soc = 0;
    }
    if(isset($_POST['Po'])){
    	$Pol = 1;
    }
    else{
    	$Pol = 0;
    }
    
    if(isset($_POST['Com'])){
    	$Com = $_POST['Com'];
    }
    else{
    	$Com = 'None';
    }
	
	$xml = new DOMDocument('1.0', 'utf-8');
	$xml->formatOutput = true;
	$xml->preserveWhiteSpace = false;
	$xml->load('seniordesigndetails.xml');

	$element = $xml->getElementsByTagName('session')[0]->getElementsByTagName('team')[2];//edit this to change where for is saved
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

	$xml->save('seniordesigndetails.xml');

	echo "Data has been written. You can logout now. <a href='index.php'>Logout</a>";
?>


</body>
</html>

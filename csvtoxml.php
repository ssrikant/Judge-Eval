<?php
    header('Location: http://localhost/Judge-Eval/projsession.php?added=1');
?>
<!DOCTYPE html>
<?php
session_start()
?>
<html>
<head> <title> Reading data </title> </head>
<body>

<?php
	$inputFilename    = 'SeniorDesignDetails.csv';
	$outputFilename   = 'SDD.xml';

	// Open csv to read
	$inputFile  = fopen($inputFilename, 'r+');
	
	// Get the headers of the file
	$headers = fgetcsv($inputFile);
	//echo sizeof($headers);
	// Create a new dom document with pretty formatting
	$doc  = new DomDocument();
	$doc->formatOutput   = true;
	
	// Add a root node to the document
	$root = $doc->createElement('teams');
	$root = $doc->appendChild($root);

	// Loop through each row creating a <row> node with the correct data
	while (($row = fgetcsv($inputFile)) !== FALSE)
	{
	    $container = $doc->createElement('team');
	    foreach($headers as $i => $header)
	    {
	    	$res = preg_replace("/[^a-zA-Z0-9]/", "", $header);
	        if(strcmp($res,'') == 0){
	        	break;
	        }
	        $child = $doc->createElement($res);
	        $child = $container->appendChild($child);
	        $value = $doc->createTextNode($row[$i]);
	        $value = $child->appendChild($value);
	    }
	
	    $root->appendChild($container);
	}

	$strxml = $doc->saveXML();
	$handle = fopen($outputFilename, "w");
	fwrite($handle, $strxml);
	fclose($handle);
?>
</body>
</html>

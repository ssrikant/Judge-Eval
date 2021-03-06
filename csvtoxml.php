<?php
session_start();
     if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1){
?>
<!DOCTYPE html>
<html>
<head> <title> Reading data </title> </head>
<body>
    <style>
      body{
        background-color: rgb(221,221,212);
        font-family: "Helvetica Neue";
      }
    </style>
<?php
	if(isset($_POST['file'])){
    	$fn = $_POST['file'];
        $exp = explode(".",$fn);
    }
    else{
    	echo "Something went wrong...";
    	echo "<script> setTimeout(function(){ window.location.href = 'sdashboard.php';}, 1000); </script>";
        exit();
    }
    
    if(strcmp($exp[1], 'csv') != 0){
    	echo "Please upload a .csv file. Redirecting...";
    	echo "<script> setTimeout(function(){ window.location.href = 'fileupload.php';}, 1000); </script>";
    	exit();
    }
	$inputFilename    = $fn;
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
    
    echo "<script>window.location.href = 'sdashboard.php?converted=1'</script>";
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





<!DOCTYPE html>

<html>
<body>

<?php
session_start();

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1){

		$details = simplexml_load_file("SDD.xml") or die("Error: Cannot create object");
    	$size = sizeof($details->team);//# of total teams

	function genRandomString() {
	    $length = 8;
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyz!?/@#$%*+=~ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $string = '';
	
	    for ($p = 0; $p < $length; $p++) {
	        $string .= $characters[mt_rand(0, strlen($characters))];
	    }
	    return $string;
	}
    echo "<a href='sdashboard.php'>Back</a> <br>";
	echo "Random String Generator: <br><br>";
    
    for($g = 0, $gg = 1; $g < $size; $g++, $gg++){
	
    	$h = genRandomString();
	
    	echo "Team $gg: " . $h . "<br>";
    	
        if(isset($pin)){
    		for($w = 0; $w < sizeof($pin); $w++){
    			if(in_array($h, $pin)){
                	$g--;
                    $gg--;
                    continue;
    		    }
    		}
        }
    
    	$pin[$g] = $h;
        $titles[$g] = $details->team[$g]->Title;
    }
    
    	$sfile = fopen("PINSforEveryTeam.txt", "w");
    
        $ii = 1;
        for($i = 0, $ii = 1; $i < sizeof($pin); $i++, $ii++){
        fwrite($sfile, "$ii.");
        fwrite($sfile, PHP_EOL);
        fwrite($sfile, $titles[$i]);
        fwrite($sfile, PHP_EOL);
        fwrite($sfile, 'PIN: ');
        fwrite($sfile, $pin[$i]);
		fwrite($sfile, PHP_EOL);
    	fwrite($sfile, PHP_EOL);
    	}
    
        fclose($sfile);
    
		$results = serialize($pin);
    	if($myfile = fopen("pins.txt", "w")){
			file_put_contents('pins.txt', $results);
			fclose($myfile);
    	}
    	else{
    		echo "No file was created";
    	}
}
else{
	echo "Please log in to view this information. Redirecting...";
    echo "<script> setTimeout(function(){ window.location.href = 'slogin.php';}, 1000); </script>";
}
?>

</body>

</html>

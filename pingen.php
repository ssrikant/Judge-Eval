
<!DOCTYPE html>

<html>
<head>
  <div class="logout">
      <a href="slogin.php">Logout</a> </br>
  </div>
  <div class="dashback">
      <a href="sdashboard.php">Back to Dashboard</a> </br>
  </div>
  <img src= "missionlogo.png" alt="Mission" style="width:1100px;height:228px;">

</head>

<body>

<?php
session_start();


     if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1){

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

	function genRandomString() {
	    $length = 9;
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyz!?/@#$%*+=~ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $string = '';

	    for ($p = 0; $p < $length; $p++) {
	        $string .= $characters[mt_rand(0, strlen($characters)-1)];
	    }
	    return $string;
	}

	echo "Random String Generator: <br><br>";

    for($g = 0, $gg = 1; $g < $size; $g++, $gg++){

    $h = genRandomString();

    echo "Team $gg: " . $h . "<br>";

    $pin[$g] = $h;
	}



} ?>

</body>
<style>
head,body{
  font-family: "Helvetica Neue";
  background-color: rgb(221,221,212);
}
div.logout{
  float:right;
}
div.dashback{
  float:left;
}
img{
  float:center;
}
</style>

</html>

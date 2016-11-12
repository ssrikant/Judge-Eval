<!DOCTYPE html>
<?php 
session_start();
?>
 <html>
 <head>
 <title>Senior Design: Judge Form</title>
 <style>
body{
	font-size: 18px;
	color: rgb(157,34,53);
}	
p{
	text-align: center;
	font-size: 20px;
	color: black;
}
input[type=radio]{
	margin-left: 60px;
	margin-right:30px;
	color: black;
}
input[type=checkbox]{
	margin-left:180px;
	margin-right:30px;
	color: black;
}
</style>
 </head>
 <body>

<?php
    
    if($myfile = fopen("pins.txt", "r")){
    	$fileinfo = file_get_contents('pins.txt');
        $pinarray = unserialize($fileinfo);
    }
    else{
    	echo "No file was found";
        exit();
    }
    
    if(isset($_POST['PIN'])){
    	$pin = $_POST['PIN'];
        $_SESSION['judge'] = 1;
    }
    
    if(in_array($pin, $pinarray)){
        $tn = array_search($pin,$pinarray);
    }
    else{
    	echo "Please go back and enter the correct PIN. Redirecting...";
        echo "<script> setTimeout(function(){ window.location.href = 'judgelogin.php';}, 1000); </script>";
    	exit();
    }
    
    $_SESSION['teamNum'] = $tn;
    
if(isset($_SESSION['judge']) && $_SESSION['judge'] == 1){
    
	$details = simplexml_load_file("SDD.xml") or die("Error: Cannot create object");
    
    $title = $details->team[$tn]->Title;
    
    for($k = 0; $k < $details->team[$tn]->EngineeringSeniors; $k++){
        if($k == 0){
            $students[$k] = $details->team[$tn]->First1 . " " . $details->team[$tn]->Last1;
            continue;
        }
        if($k == 1){
            $students[$k] = $details->team[$tn]->First2 . " " . $details->team[$tn]->Last2;
            continue;
        }
        if($k == 2){
            $students[$k] = $details->team[$tn]->First3 . " " . $details->team[$tn]->Last3;
            continue;
        }
        if($k == 3){
            $students[$k] = $details->team[$tn]->First4 . " " . $details->team[$tn]->Last4;
            continue;
        }
        if($k == 4){
            $students[$k] = $details->team[$tn]->First5 . " " . $details->team[$tn]->Last5;
            continue;
        }
        if($k == 5){
            $students[$k] = $details->team[$tn]->First6 . " " . $details->team[$tn]->Last6;
        }
    }
    
    $session = $details->team[$tn]->Session;
    
    $room = $details->team[$tn]->Location;

	$advisor[0] = $details->team[$tn]->Faculty1;
    if(strcmp($details->team[$tn]->Faculty2, '') != 0){
        $advisor[1] = $details->team[$tn]->Faculty2;
    }
?>
<img src= "missionlogo.png" alt="Mission" style="width:1300px;height:228px;">
<form id="JudgeEval" name="JudgeEval" method="POST" action="confirm.php">
	<title>Senior Design: Eval Form</title>
	<p> Project Title: <?php echo $title;?></p>
	<p> Group Members: <?php
    for($k = 0; $k < $details->team[$tn]->EngineeringSeniors; $k++){
        if($k == $details->team[$tn]->EngineeringSeniors-1){
        	echo $students[$k];
        }
        else{
        	echo $students[$k] . ", ";
        }
    }?> <p>
	<p> Session: <?php echo $session;?></p>
	<p> Room: <?php echo $room;?></p>
	<p> Advisor: <?php if(sizeof($advisor) == 1){ echo $advisor[0];} else{ echo $advisor[0] . ", " . $advisor[1];}?></p>
	<p> Judge Name: <input type="text" name="JN" required> </input></p>
	<p> Please evaluate senior engineering design projects and presentations using the following point system:<p>
	<p> 1: Poor  2: Below Average 3: Average 4: Good 5: Excellent </p>

	<strong>DESIGN PROJECT </strong><br>
	<table style="width:100%" align="left">
		<tr>
			<td>A. Technical Accuracy</td>
			<td><input type="radio" name="TA" value="5"><font color="black"> 5 </font>
				<input type="radio" name="TA" value="4"> <font color="black"> 4 </font>
				<input type="radio" name="TA" value="3"> <font color="black"> 3 </font>
				<input type="radio" name="TA" value="2"> <font color="black"> 2 </font>
				<input type="radio" name="TA" value="1"> <font color="black"> 1 </font>
			</td>
		</tr>
		<tr>
			<td>B. Creativity and Innovation</td>
			<td><input type="radio" name="CI" value="5"> <font color="black"> 5 </font>
				<input type="radio" name="CI" value="4"> <font color="black"> 4 </font>
				<input type="radio" name="CI" value="3"> <font color="black"> 3 </font>
				<input type="radio" name="CI" value="2"> <font color="black"> 2 </font>
				<input type="radio" name="CI" value="1"> <font color="black"> 1 </font>
			</td>
		</tr>
		<tr>
			<td>C. Supporting Analytical Work</td>
			<td><input type="radio" name="SAW" value="5"><font color="black"> 5 </font>
				<input type="radio" name="SAW" value="4"><font color="black"> 4 </font>
				<input type="radio" name="SAW" value="3"><font color="black"> 3 </font>
				<input type="radio" name="SAW" value="2"><font color="black"> 2 </font>
				<input type="radio" name="SAW" value="1"><font color="black"> 1 </font>
			</td>
		</tr>
		<tr>
			<td>D. Methodical Design Process Demonstrated</td>
			<td><input type="radio" name="MDPD" value="5"><font color="black"> 5 </font>
				<input type="radio" name="MDPD" value="4"><font color="black"> 4 </font>
				<input type="radio" name="MDPD" value="3"><font color="black"> 3 </font>
				<input type="radio" name="MDPD" value="2"><font color="black"> 2 </font>
				<input type="radio" name="MDPD" value="1"><font color="black"> 1 </font>
			</td>
		</tr>
		<tr>
			<td>E. Addresses Project Complexity Appropriately</td>
			<td><input type="radio" name="APCA" value="5"> <font color="black"> 5 </font>
     		   	<input type="radio" name="APCA" value="4"> <font color="black"> 4 </font>
				<input type="radio" name="APCA" value="3"> <font color="black"> 3 </font>
				<input type="radio" name="APCA" value="2"> <font color="black"> 2 </font>
				<input type="radio" name="APCA" value="1"><font color="black"> 1 </font>
			</td>
		</tr>
		<tr>
			<td>F. Expectation of Completion (by term's end)</td>
			<td><input type="radio" name="EC" value="5"> <font color="black"> 5 </font>
				<input type="radio" name="EC" value="4"> <font color="black"> 4 </font>
				<input type="radio" name="EC" value="3"> <font color="black"> 3 </font>
				<input type="radio" name="EC" value="2"> <font color="black"> 2 </font>
				<input type="radio" name="EC" value="1"> <font color="black"> 1 </font>
			</td>
		</tr>
		<tr>
			<td>G. Design and Analysis of tests</td>
			<td><input type="radio" name="DA" value="5"><font color="black"> 5 </font>
				<input type="radio" name="DA" value="4"><font color="black"> 4 </font>
				<input type="radio" name="DA" value="3"><font color="black"> 3 </font>
				<input type="radio" name="DA" value="2"><font color="black"> 2 </font>
				<input type="radio" name="DA" value="1"><font color="black"> 1 </font>
			</td>
		</tr>
		<tr>
			<td>H. Quality of Response during Q & A</td>
			<td><input type="radio" name="R" value="5"> <font color="black"> 5 </font>
				<input type="radio" name="R" value="4"> <font color="black"> 4 </font>
				<input type="radio" name="R" value="3"> <font color="black"> 3 </font>
				<input type="radio" name="R" value="2"> <font color="black"> 2 </font>
				<input type="radio" name="R" value="1"> <font color="black"> 1 </font>
			</td>
		</tr>
		</table>

	<br><br>
	<strong>PRESENTATION</strong><br>
	<table style="width:100%">
	<tr>
		<td width="31.5%">A. Organization</td>
		<td><input type="radio" name="O" value="5"><font color="black"> 5 </font>
			<input type="radio" name="O" value="4"><font color="black"> 4 </font>
			<input type="radio" name="O" value="3"><font color="black"> 3 </font>
			<input type="radio" name="O" value="2"> <font color="black"> 2 </font>
			<input type="radio" name="O" value="1"><font color="black"> 1 </font>
		</td>
	</tr>
	<tr>
		<td>B. Use of Alloted Time</td>
		<td><input type="radio" name="UAT" value="5"> <font color="black"> 5 </font>
			<input type="radio" name="UAT" value="4"> <font color="black"> 4 </font>
			<input type="radio" name="UAT" value="3"> <font color="black"> 3 </font>
			<input type="radio" name="UAT" value="2"> <font color="black"> 2 </font>
			<input type="radio" name="UAT" value="1"> <font color="black"> 1 </font>
		</td>
	</tr>
	<tr>
		<td>C. Visual Aids</td>
		<td><input type="radio" name="VA" value="5"> <font color="black"> 5 </font>
			<input type="radio" name="VA" value="4"> <font color="black"> 4 </font>
			<input type="radio" name="VA" value="3"> <font color="black"> 3 </font>
			<input type="radio" name="VA" value="2"> <font color="black"> 2 </font>
			<input type="radio" name="VA" value="1"> <font color="black"> 1 </font>
		</td>
	</tr>
	<tr>
		<td>D. Confidence and Poise</td>
		<td><input type="radio" name="CP" value="5"> <font color="black"> 5 </font>
			<input type="radio" name="CP" value="4"> <font color="black"> 4 </font>
			<input type="radio" name="CP" value="3"> <font color="black"> 3 </font>
			<input type="radio" name="CP" value="2"> <font color="black"> 2 </font>
			<input type="radio" name="CP" value="1"> <font color="black"> 1 </font>
		</td>
	</tr>
	</table>
	<br><br>
	<p>Please check off each of the following considerations that were addresssed by the presentation:</p>
	<table style="width:100%">
		<tr>	
			<td><input type="checkbox" name="Ec" value="Yes">Economic </td>
			<td><input type="checkbox" name="En" value="Yes">Environmental </td>
		</tr>
		<tr>
			<td><input type="checkbox" name="Su" value="Yes">Sustainability </td>
			<td><input type="checkbox" name="Ma" value="Yes">Manufacturability </td>
		</tr>
		<tr>
			<td><input type="checkbox" name="Et" value="Yes">Ethical </td>
			<td><input type="checkbox" name="HS" value="Yes">Health and Safety </td>
		</tr>
		<tr>
		<td><input type="checkbox" name="So" value="Yes">Social </td>
		<td><input type="checkbox" name="Po" value="Yes">Political </td>
		</tr>
		</table>
		<br>
		Comments:<br>
	    <textarea rows="4" cols="50" name="Com" form="JudgeEval" placeholder="Enter Comments here..."></textarea>
	    <br>
	    <input type="submit" value="Submit">
</form>
<a href="slogout.php">Logout</a>
<?php
}
else{
	echo "Please log in to view this information. Redirecting...";
    echo "<script> setTimeout(function(){ window.location.href = 'judgelogin.php';}, 1000); </script>";
}
?>

  </body>
  </html>

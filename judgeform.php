<!DOCTYPE html>
<?php 
session_start()
?>
 <html>
 <head>
 <title>Senior Design: Judge Form</title>
 </head>
 <body>

<?php
	$details = simplexml_load_file("seniordesigndetails.xml") or die("Error: Cannot create object");
    //change the following to change what session name/etc is automatically generated(just visuals)
    //to actually change where the form should be saved, look at confirm.php, will change based on PIN in the future...
    $title = $details->session[1]['category'];
    $student = $details->session[1]->team[0]->members;
    $advisor = $details->session[1]->team[0]->advisor;
    $room = $details->session[1]->team[0]->room;
    $sessionNumber = $details->session[1]->team[0]->sessionNumber;
	$PINNUM=$_POST['PIN'];
	if($PINNUM=="1111"){
?>
<form id="JudgeEval" name="JudgeEval" method="POST" action="confirm.php">
	<title>Senior Design: Eval Form</title>
	<p> Project Title: <?php echo $title;?></p>
	<p> Group Members: <?php echo $student;?> <p>
	<p> Session: <?php echo $sessionNumber;?></p>
	<p> Room: <?php echo $room;?></p>
	<p> Advisor: <?php echo $advisor;?></p>
	<p> Judge Name: <input type="text" name="JN"> </input></p>
	<p> Please evaluate senior engineering design projects and presentations using the following point system:<p>
	<p> 1: Poor  2: Below Average 3: Average 4: Good 5: Excellent </p>

	DESIGN PROJECT <br>
	A. Technical Accuracy
		<input type="radio" name="TA" value="5" checked> 5
		<input type="radio" name="TA" value="4"> 4
		<input type="radio" name="TA" value="3"> 3
		<input type="radio" name="TA" value="2"> 2
		<input type="radio" name="TA" value="1"> 1
	<br>
	B. Creativity and Innovation
		<input type="radio" name="CI" value="5" checked> 5
		<input type="radio" name="CI" value="4"> 4
		<input type="radio" name="CI" value="3"> 3
		<input type="radio" name="CI" value="2"> 2
		<input type="radio" name="CI" value="1"> 1
	<br>
	C. Supporting Analytical Work
		<input type="radio" name="SAW" value="5" checked> 5
		<input type="radio" name="SAW" value="4"> 4
		<input type="radio" name="SAW" value="3"> 3
		<input type="radio" name="SAW" value="2"> 2
		<input type="radio" name="SAW" value="1"> 1
	<br>
	D. Methodical Design Process Demonstrated
		<input type="radio" name="MDPD" value="5" checked> 5
		<input type="radio" name="MDPD" value="4"> 4
		<input type="radio" name="MDPD" value="3"> 3
		<input type="radio" name="MDPD" value="2"> 2
		<input type="radio" name="MDPD" value="1"> 1
	<br>
	E. Addresses Project Complexity Appropriately
		<input type="radio" name="APCA" value="5" checked> 5
        <input type="radio" name="APCA" value="4"> 4
		<input type="radio" name="APCA" value="3"> 3
		<input type="radio" name="APCA" value="2"> 2
		<input type="radio" name="APCA" value="1"> 1

	<br>
	F. Expectation of Completion (by term's end)
		<input type="radio" name="EC" value="5" checked> 5
		<input type="radio" name="EC" value="4"> 4
		<input type="radio" name="EC" value="3"> 3
		<input type="radio" name="EC" value="2"> 2
		<input type="radio" name="EC" value="1"> 1
	<br>
	G. Design and Analysis of tests
		<input type="radio" name="DA" value="5" checked> 5
		<input type="radio" name="DA" value="4"> 4
		<input type="radio" name="DA" value="3"> 3
		<input type="radio" name="DA" value="2"> 2
		<input type="radio" name="DA" value="1"> 1
	<br>
	H. Quality of Response during Q & A
		<input type="radio" name="R" value="5" checked> 5
		<input type="radio" name="R" value="4"> 4
		<input type="radio" name="R" value="3"> 3
		<input type="radio" name="R" value="2"> 2
		<input type="radio" name="R" value="1"> 1
	<br><br>
	PRESENTATION
	<br>
	A. Organization
		<input type="radio" name="O" value="5" checked> 5
		<input type="radio" name="O" value="4"> 4
		<input type="radio" name="O" value="3"> 3
		<input type="radio" name="O" value="2"> 2
		<input type="radio" name="O" value="1"> 1
	<br>
	B. Use of Alloted Time
		<input type="radio" name="UAT" value="5" checked> 5
		<input type="radio" name="UAT" value="4"> 4
		<input type="radio" name="UAT" value="3"> 3
		<input type="radio" name="UAT" value="2"> 2
		<input type="radio" name="UAT" value="1"> 1
	<br>
	C. Visual Aids
		<input type="radio" name="VA" value="5" checked> 5
		<input type="radio" name="VA" value="4"> 4
		<input type="radio" name="VA" value="3"> 3
		<input type="radio" name="VA" value="2"> 2
		<input type="radio" name="VA" value="1"> 1
	<br>
	D. Confidence and Poise
		<input type="radio" name="CP" value="5" checked> 5
		<input type="radio" name="CP" value="4"> 4
		<input type="radio" name="CP" value="3"> 3
		<input type="radio" name="CP" value="2"> 2
		<input type="radio" name="CP" value="1"> 1
	<br><br>
	<p>Please check off each of the following considerations that were addresssed by the presentation:</p>
		<input type="checkbox" name="Ec" value="Yes">Economic <br>
		<input type="checkbox" name="En" value="Yes">Environmental <br>
		<input type="checkbox" name="Su" value="Yes">Sustainability <br>
		<input type="checkbox" name="Ma" value="Yes">Manufacturability <br>
		<input type="checkbox" name="Et" value="Yes">Ethical <br>
		<input type="checkbox" name="HS" value="Yes">Health and Safety <br>
		<input type="checkbox" name="So" value="Yes">Social <br>
		<input type="checkbox" name="Po" value="Yes">Political <br>
		Comments:<br>
	    <textarea rows="4" cols="50" name="Com" form="JudgeEval" placeholder="Enter Comments here..."></textarea></br>
	    <input type="submit" value="Submit">
</form>
<a href="index.php">Logout</a>
<?php } 
	else{ 
		print("Invalid Pin");
	}
?>

  </body>
  </html>

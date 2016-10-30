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
	
  $PINNUM=$_POST['PIN'];
  if($PINNUM=="1111"){
?>
  <Form name="JudgeEval" Method="POST" Action="Confirm.php">
<title>Senior Design: Eval Form</title>
</head>
<body>
<p> Project Title: </p>
<p> Group Members: <p> 
<p> Session: </p> 
<p> Room:</p>
<p> Advisor: </p>
<Form>
	Judge Name:
	<input type="text" name="JudgeName"> <br>
<p> Please evaluate senior engineering design projects and presentations using the following point system:<p>
<p> 1: Poor  2: Below Average 3: Average 4: Good 5: Excellent </p>

DESIGN PROJECT <br>
A. Technical Accuracy
	<input type="radio" name="Technical Accuracy" value="1"> 1
	<input type="radio" name="Technical Accuracy" value="2"> 2
	<input type="radio" name="Technical Accuracy" value="3"> 3
	<input type="radio" name="Technical Accuracy" value="4"> 4
	<input type="radio" name="Technical Accuracy" value="5"> 5
<br>
B. Creativity and Innovation
	<input type="radio" name="Creativity and Innovation" value="1"> 1
	<input type="radio" name="Creativity and Innovation" value="2"> 2
	<input type="radio" name="Creativity and Innovation" value="3"> 3
	<input type="radio" name="Creativity and Innovation" value="4"> 4
	<input type="radio" name="Creativity and Innovation" value="5"> 5
<br>
C. Supporting Analytical Work 
	<input type="radio" name="Supporting Analytical Work" value="1"> 1
	<input type="radio" name="Supporting Analytical Work" value="2"> 2
	<input type="radio" name="Supporting Analytical Work" value="3"> 3
	<input type="radio" name="Supporting Analytical Work" value="4"> 4
	<input type="radio" name="Supporting Analytical Work" value="5"> 5
<br>
D. Methodical Design Process Demonstrated
	<input type="radio" name="Methodical Design Process Demonstrated" value="1"> 1
	<input type="radio" name="Methodical Design Process Demonstrated" value="2"> 2
	<input type="radio" name="Methodical Design Process Demonstrated" value="3"> 3
	<input type="radio" name="Methodical Design Process Demonstrated" value="4"> 4
	<input type="radio" name="Methodical Design Process Demonstrated" value="5"> 5
<br>
E. Addresses Project Complexity Appropriately 
	<input type="radio" name="Addresses Project Complexity Appropriately" value="1"> 1
	<input type="radio" name="Addresses Project Complexity Appropriately" value="2"> 2
	<input type="radio" name="Addresses Project Complexity Appropriately" value="3"> 3
	<input type="radio" name="Addresses Project Complexity Appropriately" value="4"> 4
	<input type="radio" name="Addresses Project Complexity Appropriately" value="5"> 5

<br> 
F. Expectation of Completion (by term's end)
	<input type="radio" name="Expectation of Completion" value="1"> 1
	<input type="radio" name="Expectation of Completion" value="2"> 2
	<input type="radio" name="Expectation of Completion" value="3"> 3
	<input type="radio" name="Expectation of Completion" value="4"> 4
	<input type="radio" name="Expectation of Completion" value="5"> 5
<br>
G. Design and Analysis of tests
	<input type="radio" name="Design and Analysis" value="1"> 1
	<input type="radio" name="Design and Analysis" value="2"> 2
	<input type="radio" name="Design and Analysis" value="3"> 3
	<input type="radio" name="Design and Analysis" value="4"> 4
	<input type="radio" name="Design and Analysis" value="5"> 5
<br>
H. Quality of Response during Q & A
	<input type="radio" name="Responses" value="1"> 1
	<input type="radio" name="Responses" value="2"> 2
	<input type="radio" name="Responses" value="3"> 3
	<input type="radio" name="Responses" value="4"> 4
	<input type="radio" name="Responses" value="5"> 5
<br>
<br>
PRESENTATION
<br>
A. Organization
	<input type="radio" name="Organization" value="5"> 1
	<input type="radio" name="Organization" value="5"> 2
	<input type="radio" name="Organization" value="5"> 3
	<input type="radio" name="Organization" value="5"> 4
	<input type="radio" name="Organization" value="5"> 5
<br>
B. Use of Alloted Time
	<input type="radio" name="Use of Alloted Time" value="5"> 1
	<input type="radio" name="Use of Alloted Time" value="5"> 2
	<input type="radio" name="Use of Alloted Time" value="5"> 3
	<input type="radio" name="Use of Alloted Time" value="5"> 4
	<input type="radio" name="Use of Alloted Time" value="5"> 5
<br>
C. Visual Aids
	<input type="radio" name="Visual Aids" value="1"> 1
	<input type="radio" name="Visual Aids" value="1"> 2
	<input type="radio" name="Visual Aids" value="1"> 3
	<input type="radio" name="Visual Aids" value="1"> 4
	<input type="radio" name="Visual Aids" value="1"> 5
<br>
D. Confidence and Poise
	<input type="radio" name="Confidence and Poise" value="1">1
	<input type="radio" name="Confidence and Poise" value="2">2
	<input type="radio" name="Confidence and Poise" value="3">3
	<input type="radio" name="Confidence and Poise" value="4">4
	<input type="radio" name="Confidence and Poise" value="5">5
<br>
<br>
<p> Please check off each of the following considerations that were addresssed by the presentation:</p>
<input type="radio" name="Economic" value="Yes">Economic <br>
<input type="radio" name="Environmental" value="Yes">Environmental <br>
<input type="radio" name="Sustainability" value="Yes">Sustainability <br>
<input type="radio" name="Manufacturability" value="Yes">Manufacturability <br>
<input type="radio" name="Ethical" value="Yes">Ethical <br>
<input type="radio" name="Health and Safety" value="Yes">Health and Safety <br>
<input type="radio" name="Social" value="Yes">Social <br>
<input type="radio" name="Political" value="Yes">Political <br>
Comments:<br>
<input type="text"> <br>
<input type="submit" value="Submit">
 </form>
<a href="judgelogin.php">Logout</a>
<?php } 
	else{ 
		print("Invalid Pin");
	}
?>


  </body>
  </html>
~


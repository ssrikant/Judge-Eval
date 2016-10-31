<?php
session_start();

	$details = simplexml_load_file("seniordesigndetails.xml") or die("Error: Cannot create object");
    $title = $details->session[3]['category'];
    $student = $details->session[3]->team[0]->members;
    $advisor = $details->session[3]->team[0]->advisor;
    $room = $details->session[3]->team[0]->room;
    $sessionNumber = $details->session[3]->team[0]->sessionNumber;

?>

<!DOCTYPE html>

<html>
  <h1>
  Session <?php echo "$sessionNumber: ";  echo $details->session[3]['category']; ?>
  </h1>
  <body>
  	  <a href="projsession.php">Back</a> <br/>
      <p>
        Team 1: <?php echo $details->session[3]->team[0]->members; ?> <br/>
      <table style = "width:75%", border="1px, solid black">
        <thead>
        <tr>
          <th>&nbsp </th>
          <th>Judge 1</th>
          <th>Judge 2</th>
          <th>Judge 3</th>
          <th>Judge 4</th>
          <th>Judge 5</th>
          <th>Judge 6</th>
          <th>Judge 7</th>
          <th>Judge 8</th>
          <th>Judge 9</th>
          <th>Judge 10</th>
          <th>Average Score</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Total Scores</td>
          <td> <?php if(isset($details->session[3]->team[0]->forms[0])){echo $details->session[3]->team[0]->forms[0]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[0]->forms[1])){echo $details->session[3]->team[0]->forms[1]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[0]->forms[2])){echo $details->session[3]->team[0]->forms[2]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[0]->forms[3])){echo $details->session[3]->team[0]->forms[3]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[0]->forms[4])){echo $details->session[3]->team[0]->forms[4]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[0]->forms[5])){echo $details->session[3]->team[0]->forms[5]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[0]->forms[6])){echo $details->session[3]->team[0]->forms[6]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[0]->forms[7])){echo $details->session[3]->team[0]->forms[7]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[0]->forms[8])){echo $details->session[3]->team[0]->forms[8]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[0]->forms[9])){echo $details->session[3]->team[0]->forms[9]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php $k = 0; for($i = 0; $i < sizeof($details->session[3]->team[0]->forms); $i++){ $k += $details->session[3]->team[0]->forms[$i]->Total;} if(sizeof($details->session[3]->team[0]->forms) >= 1){echo ($k/sizeof($details->session[3]->team[0]->forms));} else{echo '--';} ?> <br/></td>
        </tr>
      </tbody>
      </table>
    </p>

    <p>
      Team 2: <?php echo $details->session[3]->team[1]->members; ?> <br/>
      <table style = "width:75%", border="1px, solid black">
        <thead>
          <tr>
            <th>&nbsp </th>
            <th>Judge 1</th>
            <th>Judge 2</th>
            <th>Judge 3</th>
            <th>Judge 4</th>
          	<th>Judge 5</th>
          	<th>Judge 6</th>
          	<th>Judge 7</th>
          	<th>Judge 8</th>
          	<th>Judge 9</th>
          	<th>Judge 10</th>
            <th>Average Score</th>
          </tr>
        </thead>
        <tbody>
        <tr>
          <td>Total Scores</td>
          <td> <?php if(isset($details->session[3]->team[1]->forms[0])){echo $details->session[3]->team[0]->forms[0]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[1]->forms[1])){echo $details->session[3]->team[0]->forms[1]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[1]->forms[2])){echo $details->session[3]->team[0]->forms[2]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[1]->forms[3])){echo $details->session[3]->team[0]->forms[3]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[1]->forms[4])){echo $details->session[3]->team[0]->forms[4]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[1]->forms[5])){echo $details->session[3]->team[0]->forms[5]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[1]->forms[6])){echo $details->session[3]->team[0]->forms[6]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[1]->forms[7])){echo $details->session[3]->team[0]->forms[7]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[1]->forms[8])){echo $details->session[3]->team[0]->forms[8]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[1]->forms[9])){echo $details->session[3]->team[0]->forms[9]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php $k = 0; for($i = 0; $i < sizeof($details->session[3]->team[1]->forms); $i++){ $k += $details->session[3]->team[1]->forms[$i]->Total;} if(sizeof($details->session[3]->team[1]->forms) >= 1){echo ($k/sizeof($details->session[3]->team[1]->forms));} else{echo '--';} ?> <br/></td>
        </tr>
      </tbody>
      </table>
    </p>

    <p>
      Team 3: <?php echo $details->session[3]->team[2]->members; ?> <br/>
      <table style = "width:75%", border="1px, solid black">
        <thead>
          <tr>
            <th>&nbsp </th>
            <th>Judge 1</th>
            <th>Judge 2</th>
            <th>Judge 3</th>
            <th>Judge 4</th>
          	<th>Judge 5</th>
          	<th>Judge 6</th>
          	<th>Judge 7</th>
          	<th>Judge 8</th>
          	<th>Judge 9</th>
          	<th>Judge 10</th>
            <th>Average Score</th>
          </tr>
        </thead>
        <tbody>
        <tr>
          <td>Total Scores</td>
          <td> <?php if(isset($details->session[3]->team[2]->forms[0])){echo $details->session[3]->team[0]->forms[0]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[2]->forms[1])){echo $details->session[3]->team[0]->forms[1]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[2]->forms[2])){echo $details->session[3]->team[0]->forms[2]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[2]->forms[3])){echo $details->session[3]->team[0]->forms[3]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[2]->forms[4])){echo $details->session[3]->team[0]->forms[4]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[2]->forms[5])){echo $details->session[3]->team[0]->forms[5]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[2]->forms[6])){echo $details->session[3]->team[0]->forms[6]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[2]->forms[7])){echo $details->session[3]->team[0]->forms[7]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[2]->forms[8])){echo $details->session[3]->team[0]->forms[8]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[2]->forms[9])){echo $details->session[3]->team[0]->forms[9]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php $k = 0; for($i = 0; $i < sizeof($details->session[3]->team[2]->forms); $i++){ $k += $details->session[3]->team[2]->forms[$i]->Total;} if(sizeof($details->session[3]->team[2]->forms) >= 1){echo ($k/sizeof($details->session[3]->team[2]->forms));} else{echo '--';} ?> <br/></td>
        </tr>
      </tbody>
      </table>
    </p>

    <p>
      Team 4: <?php echo $details->session[3]->team[3]->members; ?> <br/>
      <table style = "width:75%", border="1px, solid black">
        <thead>
          <tr>
            <th>&nbsp </th>
            <th>Judge 1</th>
            <th>Judge 2</th>
            <th>Judge 3</th>
            <th>Judge 4</th>
          	<th>Judge 5</th>
          	<th>Judge 6</th>
          	<th>Judge 7</th>
          	<th>Judge 8</th>
          	<th>Judge 9</th>
          	<th>Judge 10</th>
            <th>Average Score</th>
          </tr>
        </thead>
        <tbody>
        <tr>
          <td>Total Scores</td>
          <td> <?php if(isset($details->session[3]->team[3]->forms[0])){echo $details->session[3]->team[0]->forms[0]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[3]->forms[1])){echo $details->session[3]->team[0]->forms[1]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[3]->forms[2])){echo $details->session[3]->team[0]->forms[2]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[3]->forms[3])){echo $details->session[3]->team[0]->forms[3]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[3]->forms[4])){echo $details->session[3]->team[0]->forms[4]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[3]->forms[5])){echo $details->session[3]->team[0]->forms[5]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[3]->forms[6])){echo $details->session[3]->team[0]->forms[6]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[3]->forms[7])){echo $details->session[3]->team[0]->forms[7]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[3]->forms[8])){echo $details->session[3]->team[0]->forms[8]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php if(isset($details->session[3]->team[3]->forms[9])){echo $details->session[3]->team[0]->forms[9]->Total;} else{echo '---';} ?> <br/></td>
          <td> <?php $k = 0; for($i = 0; $i < sizeof($details->session[3]->team[3]->forms); $i++){ $k += $details->session[3]->team[3]->forms[$i]->Total;} if(sizeof($details->session[3]->team[3]->forms) >= 1){echo ($k/sizeof($details->session[3]->team[3]->forms));} else{echo '--';} ?> <br/></td>
        </tr>
      </tbody>
      </table>
    </p>

    <div class = "reports">
        <h2>
          Click on view button to obtain an printable evaluation report for each team. <br/>
        </h2>
        <?php
          echo "<a href='convert.php?team=1&session=$sessionNumber'><button>  View Team 1 </button></a><br>";
          echo "<a href='convert.php?team=2&session=$sessionNumber'><button>  View Team 2 </button></a><br>";
          echo "<a href='convert.php?team=3&session=$sessionNumber'><button>  View Team 3 </button></a><br>";
          echo "<a href='convert.php?team=4&session=$sessionNumber'><button>  View Team 4 </button></a><br>";
        ?>
    </div>
<div><br/>
  <a href="index.php">Logout</a> <br/>
</div>
  </body>

</html>

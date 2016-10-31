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
          <th>Average Score</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Total Scores</td>
          <td> <?php echo $details->session[3]->team[0]->forms[0]->Total; ?> <br/></td>
          <td> <?php echo $details->session[3]->team[0]->forms[1]->Total; ?> <br/></td>
          <td> <?php echo $details->session[3]->team[0]->forms[2]->Total; ?> <br/></td>
          <td> <?php $k = 0; for($i = 0; $i < sizeof($details->session[3]->team[0]->forms); $i++){ $k += $details->session[3]->team[0]->forms[$i]->Total;} echo ($k/sizeof($details->session[3]->team[0]->forms)); ?> <br/></td>
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
            <th>Average Score</th>
          </tr>
        </thead>
        <tbody>
        <tr>
          <td>Total Scores</td>
          <td> <?php echo $details->session[3]->team[1]->forms[0]->Total; ?> <br/></td>
          <td> <?php echo $details->session[3]->team[1]->forms[1]->Total; ?> <br/></td>
          <td> <?php echo $details->session[3]->team[1]->forms[2]->Total; ?> <br/></td>
          <td> <?php $k = 0; for($i = 0; $i < sizeof($details->session[3]->team[1]->forms); $i++){ $k += $details->session[3]->team[1]->forms[$i]->Total;} echo ($k/sizeof($details->session[3]->team[1]->forms)); ?> <br/></td>
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
            <th>Average Score</th>
          </tr>
        </thead>
        <tbody>
        <tr>
          <td>Total Scores</td>
          <td> <?php echo $details->session[3]->team[2]->forms[0]->Total; ?> <br/></td>
          <td> <?php echo $details->session[3]->team[2]->forms[1]->Total; ?> <br/></td>
          <td> <?php echo $details->session[3]->team[2]->forms[2]->Total; ?> <br/></td>
          <td> <?php $k = 0; for($i = 0; $i < sizeof($details->session[3]->team[2]->forms); $i++){ $k += $details->session[3]->team[2]->forms[$i]->Total;} echo ($k/sizeof($details->session[3]->team[2]->forms)); ?> <br/></td>
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
            <th>Average Score</th>
          </tr>
        </thead>
        <tbody>
        <tr>
          <td>Total Scores</td>
          <td> <?php echo $details->session[3]->team[3]->forms[0]->Total; ?> <br/></td>
          <td> <?php echo $details->session[3]->team[3]->forms[1]->Total; ?> <br/></td>
          <td> <?php echo $details->session[3]->team[3]->forms[2]->Total; ?> <br/></td>
          <td> <?php $k = 0; for($i = 0; $i < sizeof($details->session[3]->team[3]->forms); $i++){ $k += $details->session[3]->team[3]->forms[$i]->Total;} echo ($k/sizeof($details->session[3]->team[3]->forms)); ?> <br/></td>
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

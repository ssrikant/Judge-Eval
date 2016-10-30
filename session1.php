<!DOCTYPE html>

<html>
  <h1>
  Session 1: Bioengineering <br/>
  </h1>
  <body>
      <p>
        Team 1: <!-- <?php echo $pin1[0]; ?> <br/> -->
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
          <td> <!-- <?php echo $ts[0]; ?> <br/> --> </td>
          <td> <!-- <?php echo $ts[1]; ?> <br/> --> </td>
          <td> <!-- <?php echo $ts[2]; ?> <br/> --> </td>
          <td> <!-- <?php echo $as[0]; ?> <br/> --> </td>
        </tr>
      </tbody>
      </table>
    </p>

    <p>
      Team 2: <!-- <?php echo $pin1[0]; ?> <br/> -->
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
            <td> 3 <!-- <?php echo $ts[0]; ?> <br/> --> </td>
            <td> 2<!-- <?php echo $ts[1]; ?> <br/> --> </td>
            <td> 23<!-- <?php echo $ts[2]; ?> <br/> --> </td>
            <td> 2<!-- <?php echo $as[0]; ?> <br/> --> </td>
          </tr>
      </tbody>
      </table>
    </p>

    <p>
      Team 3: <!-- <?php echo $pin1[0]; ?> <br/> -->
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
          <td> 23<!-- <?php echo $ts[0]; ?> <br/> --> </td>
          <td> 2<!-- <?php echo $ts[1]; ?> <br/> --> </td>
          <td> 12<!-- <?php echo $ts[2]; ?> <br/> --> </td>
          <td> 1<!-- <?php echo $as[0]; ?> <br/> --> </td>
        </tbody>
      </table>
    </p>

    <p>
      Team 4: <!-- <?php echo $pin1[0]; ?> <br/> -->
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
            <td> 32<!-- <?php echo $ts[0]; ?> <br/> --> </td>
            <td> 23<!-- <?php echo $ts[1]; ?> <br/> --> </td>
            <td> 23<!-- <?php echo $ts[2]; ?> <br/> --> </td>
            <td> 12<!-- <?php echo $as[0]; ?> <br/> --> </td>
          </tr>
       </tbody>
      </table>
    </p>

    <div class = "reports">
        <h2>
          Click on download button to obtain an evaluation report for each team. <br/>
        </h2>
        <form method = "get" action="t1report.pdf">
          <button type = "submit"> Download Team 1 </button>
        </form>
        <form method = "get" action="t2report.pdf">
          <button type = "submit"> Download Team 2 </button>
        </form>
        <form method = "get" action="t3report.pdf">
          <button type = "submit"> Download Team 3 </button>
        </form>
        <form method = "get" action="t4report.pdf">
          <button type = "submit"> Download Team 4 </button>
        </form>
    </div>
  </body>

</html>

<!DOCTYPE html>
<?php
  session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1){ ?>
<html>
<head>
</head>
   <body>
 	    <h1> Welcome Shane!</br> </h1>
      <p>
          <a href="fileupload.php" class="button">Upload Senior Design Team Details</a>
          <a href="pingen.php" class="button">Generate Team Pins for Judges Login </a>
          <a href="choosession.php" class="button">View Sessions</a>
      </p>
    </body>
    <style>
      a.button {
        -webkit-appearance: button;
        -moz-appearance: button;
        appearance: button;

        text-decoration: none;
        color: initial;
        }
    </style>

</html>
<?php } ?>

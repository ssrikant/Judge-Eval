<!DOCTYPE html>
<?php
  session_save_path("sessions");
  session_start();
  if(isset($_GET['logout'])){
    $log="";
  	$log = $_GET['logout'];
  }
  else{
  	$log = 0;
  }
?>

<html>
  <body>
	<style>
	#jl{

    }
    #sl{

    }
      body{
        background-color: rgb(221,221,212);
        font-family: "Helvetica Neue";
      }
    </style>
  <br/>
  <?php
  	session_unset();
    session_destroy();
    if($log == 1){
    	echo "Successfully logged out.<br><br>";
    }
    ?>
  <a id="jl" href = "judgelogin.php">Judge Login</a> <br/><br>
  <a id="sl" href = "slogin.php">Admin Login</a> <br/>
<br/>
</body>
</html>

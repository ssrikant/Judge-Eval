<!DOCTYPE html>
<?php
  session_start();
  if(isset($_GET['logout'])){
  	$log = $_GET['logout'];
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

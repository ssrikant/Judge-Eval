<!DOCTYPE html>
<?php
  session_start();
  if(isset($_GET['logout'])){
  	$log = $_GET['logout'];
  }
  
?>

<html>
  <body><br/>
  <?php
  	session_unset();
    session_destroy();
    if($log == 1){
    	echo "Successfully logged out.<br><br>";
    }
    ?>
  <a href = "judgelogin.php">Judge Login</a> <br/>
  <a href = "slogin.php">Admin Login</a> <br/>
<br/>
</body>
</html>

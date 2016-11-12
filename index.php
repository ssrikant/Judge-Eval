<!DOCTYPE html>
<?php
  session_start();
  
  
?>

<html>
  <body><br/>
  <?php session_unset();
    session_destroy();
    ?>
  <a href = "judgelogin.php">Judge Login</a> <br/>
  <a href = "slogin.php">Admin Login</a> <br/>
<br/>
</body>
</html>

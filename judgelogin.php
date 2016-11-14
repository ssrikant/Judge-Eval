<?php
        session_start();
        $_SESSION['judge'] = 0;
?>
<!DOCTYPE html>

<html>
    <body>
    <style>
      body{
        background-color: rgb(221,221,212);
        font-family: "Helvetica Neue";
      }
    </style>
	  <FORM name="judgelogin" method = "POST" Action="judgeform.php">
		Please enter the pin number.<br><br>
        PIN: <br/>
        <input class="button1" type = "password" name = "PIN"> <br/>
        <input class="button1" type="submit" name="Login" value="Login">
      </form>
    </body>
</html>


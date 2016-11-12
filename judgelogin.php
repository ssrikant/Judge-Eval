<?php
        session_start();
        $_SESSION['judge'] = 0;
?>
<!DOCTYPE html>
<html>
<head>
<style>
h1{
	text-align: center;
	color: rgb(157, 34,53);
	font-size: 30px;
}
h2{
	text-align: center;
	color: rgb(157,34,53);
	font-size:25px;
}
form{
	text-align: center;
	margin: 0 auto;
	color: rgb(157,34,53);
}
</style>
</head>
<img src= "missionlogo.png" alt="Mission" style="width:1300px;height:228px;">
	<h1>Welcome to the Senior Design Judge login!</h1>
	<h2>Please enter the pin number for the team you wish to evaluate.</h2>
	<body>
				
	  <FORM name="judgelogin" method = "POST" Action="judgeform.php">
        <input type = "password" name = "PIN"> <br/>
        <input type="submit" name="Login" value="Login">
      </form>
    </body>
</html>



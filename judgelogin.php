<!DOCTYPE html>
<head>
<style>
h1{
	text-align: center;
	
	font-size: 50px;
}
h2{
	text-align: center;
	font-size:50px;
}
form{
	font-size:28px;
	margin: 0 auto;
	
}
</style>
</head>
	<img src= "missionlogo.png" alt="Mission" style="width:1300px;height:228px;">
<?php
        session_save_path("sessions");
        session_start();
    
    if($myfile = fopen("pinser.txt", "r")){
    	$fileinfo = file_get_contents('pinser.txt');
        $pinarray = unserialize($fileinfo);
    }
    else{
    	echo "No file was found";
        exit();
    }

    if(isset($_POST['PIN'])){
    	$pin = filter_var($_POST['PIN'], FILTER_SANITIZE_STRING);
        $_SESSION['judge'] = 1;
            
        if(in_array($pin, $pinarray)){
        	$tn = array_search($pin,$pinarray);
    	}
    	else{
    	    echo "<script> window.location.href = 'judgelogin.php?wrong=1'; </script>";
    		exit();
    	}
    	$_SESSION['teamNum'] = $tn;
        echo "<script> window.location.href = 'judgeform.php'; </script>";
    }
	else{?>

    	<html>
    	<body>
    	<style> body{ background-color: rgb(221,221,212); font-family: "Helvetica Neue";}</style>
    <?php    if(isset($_GET['wrong']) && $_GET['wrong'] == 1){
        	echo "Incorrect PIN";
        }?>
        <FORM name="judgelogin" method = "POST" Action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		Please enter the pin for the team you wish to evaluate.<br><br>
        <strong>PIN:</strong> <br/>
        <input class="button1" type = "password" name = "PIN" autocomplete="off"> <br/>
       	<input class="button1" type="submit" name="Login" value="Login">
      	</form>
   		</body>
		</html>
    <?php } ?>

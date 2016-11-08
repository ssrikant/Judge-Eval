<!DOCTYPE html>

<?php
 session_start();

 $username = "user";
 $password = "test";

 if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
   header("Location: sdashboard.php");
 }

 if(isset($_POST['username']) && isset($_POST['password'])){
          if($_POST['username'] == "user" && $_POST['password'] == "test"){
            $_SESSION['logged_in'] = true;
            header("Location: sdashboard.php");
          }
 }


?>

<html>
    <body>
      <form method = "post" action="sdashboard.php">
        Username: <br/>
        <input type = "text" name = "username"> <br/>
        Password: <br/>
        <input type = "password" name = "password"> <br/>
        <input type= "submit" value = "Login">
      </form>
    </body>
</html>

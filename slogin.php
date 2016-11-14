<?php
        session_start();

            $username = "swibeto";
            $password= "1msaili3!";


        if(isset($_GET['logout'])) {
            $_SESSION['username'] = '';
            header('Location: index.php' . $_SERVER['PHP_SELF']);
        }

        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1){
          header("Location: sdashboard.php");
        }

        if(isset($_POST['username']) && isset($_POST['password'])){
            if($_POST['username'] == "swibeto" && $_POST['password'] == "1msaili3!") {
                $_SESSION['logged_in'] = 1;
                header('Location: sdashboard.php');
            }
        }
?>
<?php if(isset($_SESSION['logged_in']) == true): ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">

        <body>
            <?php header("Location: sdashboard.php"); ?>
        </body>
    </html>

<?php else: ?>
    <html>
        <head>
            <title>Log In</title>
        </head>
        <body>
            <img src= "missionlogo.png" alt="Mission" style="width:1100px;height:228px;">
            <h1>Please login:</h1>
            <form name="login" action="" method="post">
                <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                    <tr>
                        <td width="78">Username:</td>
                        <td width="294"><input name="username" type="text" id="username"></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input name="password" type="password" id="password"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="Submit" value="Login"></td>
                    </tr>
                </table>
            </form>
        </body>
        <style>
        body, table{
          background-color: rgb(221,221,212);
          font-family: "Helvetica Neue";
        }
        </style>
    </html>
<?php endif; ?>

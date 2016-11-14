<!DOCTYPE html>
<?php
  session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1){ ?>
<html>
<title>Dasbhoard</title>
<head>
  <div class="logout">
      <a href="index.php">Logout</a> </br>
  </div>
  <img src= "missionlogo.png" alt="Mission" style="width:1100px;height:228px;">

</head>
   <body>
 	    <h1> Welcome Shane!</br> </h1>
      <p>
          <a href="fileupload.php" class="button1">Upload Senior Design Team Details</a>
          <a href="pingen.php" class="button2">Generate Team Pins for Judge Login </a>
          <a href="choosession.php" class="button3">View Sessions</a>
      </p>

    </body>
    <style>
      div.logout{
        float:right;
      }
      body{
        background-color: rgb(221,221,212);
        font-family: "Helvetica Neue";
      }

      a.button1, a.button2, a.button3 {
        -moz-appearance: button;
        appearance: button;
        background-color: rgb(157,34,53); /*red SCU color */
        width:250px;
        height:75px;

        text-decoration: none;
        color: initial;


        border: none;
        border-radius: 4px;
        color: white;
        padding: 15px 32px;
        text-align: center;

        display: inline-block;
        font-size: 25px;
        }

      a.button1{
        float:left;

      }
      a.button2{
        float:center;
      }
      a.button3{
        float:right;
        position: absolute;
      }
      a.button1, a.button2, a.button3:hover{
        background-color: grey;
      }
    </style>

</html>
<?php } ?>

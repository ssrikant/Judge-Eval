<!DOCTYPE html>

<?php
  session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1){ ?>
<html>
   <body><?php
	//echo '<input type="hidden" id="refresh" value="no">';
	//echo '<script type="text/javascript"> onload=function(){ var e=document.getElementById("refreshed"); if(e.value=="no")e.value="yes"; else{e.value="no";location.reload();}} </script>';
   ?>
 	    <h1> Welcome Shane! Please upload Senior Design Team Information file or choose a session. </br> </h1>
        <p>
          Please Upload Senior Design Team Information in a .csv file format. </br>
          Steps to export any excel file to csv: </br>
          1. Open excel file. </br>
          2. File -> SaveAs -> choose "csv" as the file type after re-naming the csv version of the file. </br>
        </br>
        </p>
      <p>
        <form method = "post" action = "csvtoxml.php">
           <input type = "file" name = "file" />
           <input type = "submit"/> </br>
        </form>
      </p>
</html>
<?php } ?>

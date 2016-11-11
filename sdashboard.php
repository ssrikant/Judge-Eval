<!DOCTYPE html>
<?php
  session_start();
?>

<?php

    $details = simplexml_load_file("SDD.xml") or die("Error: Cannot create object");
    $size = sizeof($details->team);//# of total teams
    $j = 1;
    $s[0] = $details->team[0]->Session;
    $index[0] = 0;
    for($i = 1; $i < $size-1; $i++){
        if(strcmp($details->team[$i]->Session, $details->team[$i-1]->Session) != 0){
                $s[$j] = $details->team[$i]->Session;//$s holds all the sessions
            $index[$j] = $i;//holds the indexes where the sessions is found
            $j++;
        }
    }
    $index[$j] = $i;
?>
<?php
   if(isset($_FILES['file'])){
      $errors= array();
      $file_name = $_FILES['file']['name'];
      $file_size = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];
      $file_type = $_FILES['file']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));

      $expensions= array("xlsx","csv", "xls");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="File extension is not allowed, please choose an XLSX/XLS or CSV file.";
      }

      if($file_size > 102400) {
         $errors[]='File size cannot exceed 100 KB';
      }

      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"csvtoxml.php");
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<html>
<head>
  <?php
          //check to see if session is inactive, if true -> redirect to login page!
         if(!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != ''){
             header ("Location: slogin.php");
             exit; // stop further executing, very important
         }
  ?>
</head>
   <body>
 	    <h1> Welcome Shane! Please upload Senior Design Team Information file or choose a session. </br> </h1>
        <p>
          Please Upload Senior Design Team Information in a .csv file format. </br>
          Steps to export any excel file to csv: </br>
          1. Open excel file. </br>
          2. File -> SaveAs -> choose "csv" as the file type after re-naming the csv version of the file. </br>
        </br>
        </p>
      <p>
        <form action = "csvtoxml.php" method = "POST" enctype = "multipart/form-data">
           <input type = "file" name = "file" />
           <input type = "submit"/> </br>
        </form>
      </p>
      <p>
          Choose a Session: </br>
          <?php
                for($i = 0, $j = 1; $i < sizeof($index)-1; $i++, $j++){
                        echo "<a href = 'session.php?session=$j'>$s[$i]</a> <br/>";
                }
          ?>
        <a href="index.php">Logout</a> </br>
      </p>

      <p>
        <form action= "pingen.php" method="POST"> //Need to connect this to the pin generator
          <button type="submit">Generate Team Pins for Judges login</button><br>
        </form>
      </p>

    </body>

</html>

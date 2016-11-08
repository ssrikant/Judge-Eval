<!DOCTYPE html>
<?php
  session_start();
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
         move_uploaded_file($file_tmp,"file/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<html>
   <body>
 	<h1> Welcome Shane! Please upload Senior Design Team Information file or choose a session. </br> </h1>
      <p>
      <form action = "csvtoxml.php" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "file" />
         <input type = "submit"/>
         <?php
         if(empty($errors)== true){
          echo "Uploaded File: "; echo $_FILES['file']['name'];
         }
         ?>
      </form>
    </p>
    <p>
        <?php
              for($i = 0, $j = 1; $i < sizeof($index)-1; $i++, $j++){
                      echo "<a href = 'session.php?session=$j'>$s[$i]</a> <br/>";
          }
              ?>

        <a href="index.php">Logout</a> </br>

      </p>


   </body>
</html>

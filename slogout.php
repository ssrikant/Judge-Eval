<!DOCTYPE html>

<?php
  session_start();
?>
<html>

<body>
    <?php session_unset();
    session_destroy();
    ?>
</body>

</html>

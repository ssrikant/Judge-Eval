

<?php
function genRandomString() {
    $length = 8;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz!?/@#$%*+=~';
    $string = '';

    for ($p = 0; $p &amp;amp;lt; $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters))];
    }

    return $string;
}
?>


<!DOCTYPE html>

<html>
<body>
Random String Generator:

<?php

    echo "Random String:" + genRandomString();

?>

</body>

</html>

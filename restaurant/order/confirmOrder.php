<?php

function confirm() {
    echo '<script language="javascript">';
    $msg = 'Table: ' . $_POST['table'] . '  Order Confirmed';
    echo 'if(!alert("' . $msg . '"))';
    echo "{document.location = 'createOrder.php'}";
    echo '</script>';
}
confirm();

?>
<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$pathConn = $path . "/restaurant/mysqlConnect.php";
include_once $pathConn;


function insertIntoDB() {
    // generate a current id
    $sql_get_max = 'SELECT max(id) FROM order_id_log';
    $stmt = $dbh->prepare($sql_get_max);
    $stmt->execute();
    $order_id = $stmt->fetch()[0] + 1;
    $sql_insert = 'INSERT INTO order(`order_id`, `table`, `food_id`, `quantity`) values(:order_id, :table, :food_id, :quantity, :note)';
    $stmt = $dbh->prepare($sql_insert);
    $table = $food_id = $quantity = $note = '';
    $stmt->bindParam(':order_id', order_id, ':table', $table, ':food_id', $food_id, ':quantity', $quantity, ':note', $note);
    $table = array_shift($_POST);
    while (!$_POST) {
        $food_name = array_shift($_POST);
        $sql = 'SELECT `food_id` FROM `food` WHRER name='.$food_name;
        $stmtTemp = $dbh->prepare($sql);
        $quantity = array_shift($_POST);
        $note = array_shift($_POST);
    }
}



function confirm() {
    echo '<script language="javascript">';
    $msg = 'Table: ' . $_POST['table'] . '  Order Confirmed';
    echo 'if(!alert("' . $msg . '"))';
    echo "{document.location = 'createOrder.php'}";
    echo '</script>';
}


?>
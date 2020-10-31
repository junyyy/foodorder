<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$pathConn = $path . "/restaurant/mysqlConnect.php";
include_once $pathConn;

$table = array_shift($_POST);
function insertIntoDB($dbh, $table) {
    // generate a current id
    $sql_get_max = 'SELECT max(id) FROM order_id_log';
    $stmt = $dbh->prepare($sql_get_max);
    $stmt->execute();
    $order_id = $stmt->fetch()[0] + 1;
    $sql_insert = 'INSERT INTO `order`(`order_id`, `table`, `food_id`, `quantity`, `note`) values (:order_id, :tbl, :food_id, :quantity, :note)';
    $stmt = $dbh->prepare($sql_insert);
    $food_id = $quantity = $note = '';
    $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
    $stmt->bindParam(':tbl', $table, PDO::PARAM_INT);
    $stmt->bindParam(':food_id', $food_id, PDO::PARAM_INT);
    $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
    $stmt->bindParam(':note', $note, PDO::PARAM_STR);


    while (!empty($_POST)) {
        $food_name = array_shift($_POST);
        $sql = 'select `food_id` from `food` where `name` = "' . $food_name . '"' ;
        $select_stmt = $dbh->prepare($sql);
        $select_stmt->execute();
        $food_id = $select_stmt->fetch()[0];
        $quantity = array_shift($_POST);
        $note = array_shift($_POST);
        $stmt->execute();

    }
    // the id itself auto increment, so do not set the value
    $sql = 'INSERT INTO `order_id_log` (`id`) VALUES (NULL)';
    $dbh->query($sql);
}



function confirm($table) {
    echo '<script language="javascript">';
    $msg = 'Table: ' .$table . '  Order Confirmed';
    echo 'if(!alert("' . $msg . '"))';
    echo "{document.location = 'createOrder.php'}";
    echo '</script>';
}

insertIntoDB($dbh, $table);
confirm($table);

?>
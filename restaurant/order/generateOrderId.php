<?php
include_once 'mysqlConnect.php';
$sql_get_max = 'SELECT max(id) FROM order_id_log';
$stmt = $dbh->prepare($sql_get_max);
$stmt->execute();
$id = $stmt->fetch()[0] + 1;
echo $id;


?>

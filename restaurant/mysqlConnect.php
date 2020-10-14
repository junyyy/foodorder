<?php
include_once 'foodorderConfig.php';
$dsn = 'mysql:host='.HOST.'; dbname='.DBNAME.';';
$user = USER;
$password = PASSWORD;
try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed ' . $e->getMessage();
}
?>
<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/restaurant/config/dbConfig.php";
include_once $path;

$dsn = 'mysql:host='.HOST.'; dbname='.DBNAME.';';
$user = USER;
$password = PASSWORD;
try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed ' . $e->getMessage();
}

?>
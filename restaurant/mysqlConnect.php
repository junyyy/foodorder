<?php
include_once 'foodorderConfig.php';
$dsn = 'mysql:host='.HOST.'; dbname='.DBNAME.';';
$user = USER;
$password = PASSWORD;
try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'select * from `food` where 1';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        print $row['name'];
        echo "<br>";

    }
} catch (PDOException $e) {
    echo 'Connection failed ' . $e->getMessage();
}
?>
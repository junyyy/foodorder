<?php
include_once 'config.php';
$dsn = 'mysql:host='.HOST.'; dbname='.DBNAME.';';
$user = USER;
$password = PASSWORD;
$id = '2 or 1=1';
$lastname = 'asdf';
$firstname = 'asdfg';
$ttt=null;
echo var_dump($ttt);
try {
    $dbh = new PDO($dsn, $user, $password);
    $sql = 'SELECT * from Persons WHERE PersonID=' . $dbh->quote($id);

    foreach ($dbh->query($sql) as $row) {

    }




} catch (PDOException $e) {
    echo 'Connection failed: '. $e->getMessage();
}

?>

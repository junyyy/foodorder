<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8">
    <title>Display Orders</title>
    <link rel="stylesheet" type="text/css" href="display.css">
</head>

<body>
    <div class="topnav">
        <a hre="" target="_top">Home</a>
    </div>
    <hr>
    <?php
    include_once 'mysqlConnect.php';
//    $sql = 'select * from order';
//    $stmt = $dbh->prepare($sql);
//    echo var_dump($stmt);
//    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//        echo $row;
//        print $row['order_id'] . "\n";
//        print "here";
//    }

    ?>
    <div class="orderBlock">
        <p>
            id: abc <br>
            table: <br>
            items:
        </p>
    </div>
</body>

</html>
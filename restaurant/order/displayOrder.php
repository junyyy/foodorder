<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8">
    <title>Display Orders</title>
    <link rel="stylesheet" type="text/css" href="../style/display.css">
</head>

<body>
    <div class="topnav">
        <a hre="" target="_top">Home</a>
    </div>
    <hr>
    <?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $pathConn = $path . "/restaurant/mysqlConnect.php";
    include_once $pathConn;

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
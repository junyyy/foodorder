<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body style="background: #b5d4ea; alignment: center">
    <?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $pathRes = $path . "/restaurant/config/restaurantConfig.php";
    $pathConn = $path . "/restaurant/mysqlConnect.php";
    include_once $pathRes;
    include_once $pathConn;

    $sql = "SELECT name from `food`";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $foodNames = array();
    while ($row = $stmt->fetch()) {
        array_push($foodNames, $row['name']);
    }
    ?>

    <script type="text/javascript">
        var foodNames = <?php echo json_encode($foodNames); ?>;
        $(document).ready(function(){
            $(".food_name").autocomplete({
                source: foodNames,
            });
        });
    </script>
    <form style="margin-left: 100px" method="post" onsubmit="if(!confirm('Confirm?')){return false;}" action="confirmOrder.php">
        <p id="p_order_head">
            Food Order
            Table <input name="table" type="number" required="required" min="1" max= <?php echo MAX_TABLE ?>>
        </p>
        <p id="test">TEST</p>


        <table border="1px">
            <tr>
                <th align="left">Food</th>
                <th align="left">Quantity</th>
                <th align="left">Note</th>
            </tr>

            <tr>
                <td><input class="food_name" name="food_1" type=text></td>
                <td><input name="quantity_1" type="number" value="1" min="1"></td>
                <td><input name="note_1" type="text"></td>
            </tr>
            <tr>
                <td><input class="food_name" name="food_2" type=text></td>
                <td><input name="quantity_2" type="number" value="1" min="1"></td>
                <td><input name="note_2" type="text"></td>
            </tr>
            <tr>
                <td><input class="food_name" name="food_3" typ class="food_name" =text></td>
                <td><input name="quantity_3" type="number" value="1" min="1"></td>
                <td><input name="note_3" type="text"></td>
            </tr>
            <tr>
                <td><input class="food_name" name="food_4" type=text></td>
                <td><input name="quantity_4" type="number" value="1" min="1"></td>
                <td><input name="note_4" type="text"></td>
            </tr>
            <tr>
                <td><input class="food_name" name="food_5" type=text></td>
                <td><input name="quantity_5" type="number" value="1" min="1"></td>
                <td><input name="note_5" type="text"></td>
            </tr>
            <tr>
                <td><input class="food_name" name="food_6" type=text></td>
                <td><input name="quantity_6" type="number" value="1" min="1"></td>
                <td><input name="note_6" type="text"></td>
            </tr>
            <tr>
                <td><input class="food_name" name="food_7" type=text></td>
                <td><input name="quantity_7" type="number" value="1" min="1"></td>
                <td><input name="note_7" type="text"></td>
            </tr>
        </table>
        <input value="Submit" type="submit">
        <a href="">cancel</a>
    </form>

</body>
</html>

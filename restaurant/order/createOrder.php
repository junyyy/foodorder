<!DOCTYPE html>
<html>
<head>

</head>
<body>
<?php
include_once "../config/restaurantConfig.php";
?>
    <form method="post" onsubmit="if(!confirm('Confirm?')){return false;}" action="confirmOrder.php">
        <p id="p_order_head">
            Food Order
            Table <input name="table" type="number" required="required" min="1" max= <?php echo MAX_TABLE ?>>
        </p>

        <table border="1px">
            <tr>
                <th align="left">Food</th>
                <th align="left">Quantity</th>
                <th align="left">Note</th>
            </tr>

            <tr>
                <td><input name="food" type=text></td>
                <td><input type="number" value="1" min="1"></td>
                <td><input type="text"></td>
            </tr>
        </table>
        <input value="Submit" type="submit">
        <a href="">cancel</a>
    </form>

</body>
</html>

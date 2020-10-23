<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    </head>
    <body>
        <table border="1px">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>age</th>
            </tr>
            <?php
            for($i = 0; $i < 10; $i++):?>
            <tr>

                <?php
                echo "<td>A</td>";
                echo "<td>$i</td>";
                echo "<td>X</td>";
                ?>

            </tr>
            <?php endfor?>
        </table>



    </body>

</html>





<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background: #b5d4ea;
            alignment: center
        }

        form {
            border: #000000 2px;
            position: fixed;
            width: 70%;

        }

        .inputDiv > * {
            line-height: 150%;
            margin: 2px 2px;
            background: aquamarine;
            alignment: left;
        }

        ::placeholder {
            opacity: 0.5;
        }


        .autocomplete {
            position: relative;
            display: inline-block;



        }

        .autocomplete-items {
            position: absolute;
            border: 1px solid #d4d4d4;
            border-bottom: none;
            border-top: none;
            z-index: 99;
            top: 100%;
            left: 0;
            right: 0;
        }

        .autocomplete-items div {
            padding: 10px;
            cursor: pointer;
            background-color: #ffffff;
            border-bottom: 1px solid #d4d4d4;
        }

        .autocomplete-items div:hover {
            background-color: #e9e9e9;
        }
        .autocomplete-active {
            background-color: DodgerBlue !important;
            color: #ffffff;
        }

        button {
            left:150px;
            top:75px;
            position: relative;
        }




    </style>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="autocomplete.js"></script>

</head>


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



    <form id="form", autocomplete="off" method="post" onsubmit="if(!confirm('Confirm?')){return false;}" action="confirmOrder.php">
        <h1>Order</h1>
        <p id="p_order_head">
            Table <input name="table" type="number" required="required" min="1" max= <?php echo MAX_TABLE ?>>
        </p>

        <div id="divOrder">
            <div class="autocomplete">
                <input id="f1", name="food_1" type=text placeholder="Food" required="required">
                <input name="quantity_1" type="number" min="1" placeholder="Quantity" required="required">
                <input name="note_1" type="text" placeholder="Note">
                <a href="#" class="removeLink">Remove</a>
            </div>
        </div>
        <input id="submitBtn" value="Submit" type="submit">
    </form>

    <button onclick="addItem()">Add</button>
    <script>
        var num = 2;
        function addItem() {
            let nameInput = document.createElement("input");
            let id = "f" + num;
            nameInput.setAttribute("id", id);
            nameInput.setAttribute("name", "food_" + num);
            nameInput.setAttribute("type", "text");
            nameInput.setAttribute("placeholder", "Food");
            nameInput.setAttribute("required", "required");

            let quantityInput = document.createElement("input");
            quantityInput.setAttribute("name", "quantity_" + num);
            quantityInput.setAttribute("type", "number");
            quantityInput.setAttribute("min", "1");
            quantityInput.setAttribute("placeholder", "Quantity");
            quantityInput.setAttribute("required", "required");


            let noteInput = document.createElement("input");
            noteInput.setAttribute("name", "note_" + num);
            noteInput.setAttribute("type", "text");
            noteInput.setAttribute("placeholder", "Note");

            let removeLink= document.createElement("a");
            removeLink.href = "#";
            removeLink.className = "removeLink";
            removeLink.text = "Remove";
            let mainDiv = document.getElementById("divOrder");
            let div = document.createElement("div");
            div.setAttribute("class", "autocomplete");
            div.appendChild(nameInput);
            div.insertAdjacentHTML('beforeend', " ");
            div.appendChild(quantityInput);
            div.insertAdjacentHTML('beforeend', " ");
            div.appendChild(noteInput);
            div.insertAdjacentHTML('beforeend', " ");
            div.appendChild(removeLink);
            mainDiv.appendChild(div);

            autocomplete(document.getElementById(id), foodNames);
            console.log("the id is: " + id);
            num++;
            console.log("the num is: " + num);

        }

       $("#form").on("click", "a", function (event) {
           $(this).parent().remove();
       });


        let foodNames = <?php echo json_encode($foodNames); ?>;
        autocomplete(document.getElementById("f1"), foodNames);

    </script>



</body>
</html>


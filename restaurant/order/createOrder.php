<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background: #b5d4ea;
            alignment: center
        }



        .inputDiv > * {
            line-height: 150%;
            margin: 2px 2px;
            background: aquamarine;
            alignment: left;
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
            background-color: #fff;
            border-bottom: 1px solid #d4d4d4;
        }

        .autocomplete-items div:hover {
            background-color: #e9e9e9;
        }
        .autocomplete-active {
            background-color: DodgerBlue !important;
            color: #ffffff;
        }



    </style>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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

<!--the script aims to auto-complete the input food names-->
    <script type="text/javascript">
        var foodNames = <?php echo json_encode($foodNames); ?>;
        function autocomplete(inp, arr) {
            let currentFocus;
            inp.addEventListener("input", function(e) {
               let a, b, i, val = this.val;
               closeAllLists();
               if (!val) {return false;}
               currentFocus = -1;
               a = document.createElement("div");
               a.setAttribute("id", this.id + "autocomplete-list");
               a.setAttribute("class", "autocomplete-items");
               this.parentNode.appendChild(a);
               for (i = 0; i < arr.length; i++) {

               }




                function closeAllLists(element) {
                    let x = document.getElementByClassName("autocomplete-items");
                    for (let i = 0; i < x.length; i++) {
                        if (element != x[i] && element != inp) {
                            x[i].parentNode.removeChild(x[i]);
                        }
                    }
                }

            });
        }


    </script>
    <button onclick="addItem()">Add more</button>
    <form id="form", method="post" onsubmit="if(!confirm('Confirm?')){return false;}" action="confirmOrder.php">
        <h1>Order</h1>
        <p id="p_order_head">
            Table <input name="table" type="number" required="required" min="1" max= <?php echo MAX_TABLE ?>>
        </p>

        <div id="divOrder">
            <div class="inputDiv">
                <input name="food_1" type=text>
                <input name="quantity_1" type="number"  min="1">
                <input name="note_1" type="text">
                <a href="#" class="removeLink">Remove</a>
                <br>
            </div>

            <div class="inputDiv">
                <input name="food_2" type=text>
                <input name="quantity_2" type="number"  min="1">
                <input name="note_2" type="text">
                <a href="#" class="removeLink">Remove</a>
                <br>
            </div>

            <div class="inputDiv">
                <input name="food_3" type=text>
                <input name="quantity_3" type="number"  min="1">
                <input name="note_3" type="text">
                <a href="#" class="removeLink">Remove</a>
                <br>
            </div>
        </div>


        <input value="Submit" type="submit">
    </form>


    <script>
        function addItem() {
            var num = 4;
            let nameInput = document.createElement("input");
            nameInput.name = "food_" + num;
            nameInput.type = "text";
            let quantityInput = document.createElement("input");
            quantityInput.name = "quantity_" + num;
            quantityInput.type = "number";
            quantityInput.min = "1";
            let noteInput = document.createElement("input");
            noteInput.name = "note_" + num;
            noteInput.type = "text";
            let removeLink= document.createElement("a");
            removeLink.href = "#";
            removeLink.className = "removeLink";
            removeLink.text = "Remove";
            let mainDiv = document.getElementById("divOrder");
            let div = document.createElement("div");
            div.className = "inputDiv";
            mainDiv.appendChild(div);
            div.appendChild(nameInput);
            div.appendChild(quantityInput);
            div.appendChild(noteInput);
            div.appendChild(removeLink);

            num++;
        }

       $("#form").on("click", "a", function (event) {
           console.log($(this).text());
           $(this).parent().remove();
       });
    </script>


</body>
</html>


<?php include 'config/database.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Table</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="container-fluid">
            <ul class="item-list">
                <li class="item">
                </li>
                <li class="item">
                    <p class="name">Name</p>
                    <input type="text" id="name" value="">
                </li>

                <li class="item">
                    <p class="name">Price</p>
                    <input type="number" id="price" value="">
                </li>

                <li class="item">
                    <p class="name">Quantity</p>
                    <input type="number" id="qty" value="">
                </li>

                <li class="item">
                    <p class="name">Total</p>
                    <input type="number" id="total" readonly value="">
                </li>

                <li class="item">
                    <p class="name">Discount</p>
                    <input type="number" id="dis" value="">
                </li>

                <li class="item">
                    <p class="name">Discount %</p>
                    <input type="number" id="disper" value="">
                </li>

                <li class="item">
                    <p class="name">Net total</p>
                    <input type="number" id="nettotal" value="">
                </li>

                <div id="btn_div">
                    <button class="btn1" id="add" onclick="javascript:addRow();">Add</button>

                </div>
                <!-- <button class="btn1" id="update" onclick="update()">Update</button> -->


            </ul>
        </div>
    </header>

    <form action="save.php" method="POST">
        <input type="hidden" value="0" id="ID" name="numrow">

        <div>
            <heading>
                <h1>Item-Table</h1>
            </heading>
            <table id="table">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Discount</th>
                    <th>Discount %</th>
                    <th>Net total</th>
                    <th>Action</th>
                </tr>



            </table>

        </div>

        <div class="container-fluid">
            <div class="item-list2">

                <div class="item">
                    <p class="name">Total</p>
                    <input type="number" id="total_2" name="total_2" readonly value="0">
                </div>

                <div class="item">
                    <p class="name">Discount</p>
                    <input type="number" id="dis_2" name="dis_2" value="">
                </div>

                <div class="item">
                    <p class="name">Discount %</p>
                    <input type="number" id="disper_2" name="disper_2" value="">
                </div>

                <div class="item">
                    <p class="name">Net total</p>
                    <input type="number" id="net_total" name="net_total" value="0">

                </div>
            </div>

        </div>

        <br>
        <br>
        <input type="number" name="billNo" id="billNo" value="1">
        <br>
        <br>

        <button type="submit">Save</button>
    </form>

    <script src="main.js"></script>
</body>

</html>
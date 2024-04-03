<?php
include 'config/database.php';

$billNo = $_POST['billNo'];
$billNo = empty($billNo) ? 0 : $billNo;

$billQuery = "SELECT * FROM `invoicedata` WHERE BillNo = '$billNo'";
$billData = mysqli_query($conn, $billQuery);
$billData = mysqli_fetch_assoc($billData);
// print_r($billData);

$billValues = "SELECT * FROM `invoicedetails` WHERE BillNo = '$billNo'";
$billDetails = mysqli_query($conn, $billValues);
// $billDetails = mysqli_fetch_array($billDetails);
// mysqli_fetch_all()
// $result = mysqli_fetch_all($billDetails);

// print_r($result);






?>


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
                    <button type="button" class="btn1" id="add" onclick="addRow()">Add</button>

                </div>
                <!-- <button class="btn1" id="update" onclick="update()">Update</button> -->


            </ul>
        </div>
    </header>
    <form action="#" method="POST" id="invoice-form">

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
                <?php
                $i = 1;

                while ($row = mysqli_fetch_assoc($billDetails)) {
                    print_r($row);
                    $id = $row['id'];
                    $name = $row['name'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $total = $row['total'];
                    $discount = $row['discount'];
                    $disPer = $row['disPer'];
                    $netTotal = $row['netTotal'];

                    echo '<tr id="row_' . $i . '">
                    <td> ' . $i . '</td>
                    <td> <input type="hidden" value="' . $name . '" id="name' . $i . '" name="name' . $i . '">' . $name . '</td>
                    <td> <input type="hidden" value="' . $price . '" id="price' . $i . '" name="price' . $i . '">' . $price . '</td>
                    <td> <input type="hidden" value="' . $qty . '" id="qty' . $i . '" name="qty' . $i . '">' . $qty . '</td>
                    <td> <input type="hidden" value="' . $total . '" id="total' . $i . '" name="total' . $i . '">' . $total . '</td>
                    <td> <input type="hidden" value="' . $discount . '" id="dis' . $i . '" name="dis' . $i . '">' . $discount . '</td>
                    <td> <input type="hidden" value="' . $disPer . '" id="disper' . $i . '" name="disper' . $i . '">' . $disPer . '</td>
                    <td> <input type="hidden" value="' . $netTotal . '" id="nettotal' . $i . '" name="nettotal' . $i . '" class="ntotal">' . $netTotal . '</td>
                    <td><button type="button" class="btn2" onclick="delRow(' . $i . ')">Delete</button><button type="button" class="btn3" onclick="editRow(' . $i . ')">Edit</button></td>
                    </tr>';

                    $i++;
                }
                ?>;

                <br>
                <br>
                <br>
                <br>
                <br>
                <?php
                // foreach ($result as $row) {

                //     print_r($row);
                //     echo '<tr>
                //         <td> <input type="hidden" value=" id="" name="">' . $row[0] . '</td>
                //         <td> <input type="hidden" value="" id="" name="">' . $row[0] . '</td>
                //         <td> <input type="hidden" value="" id="" name="">' . $row[0] . '<td>
                //         <td> <input type="hidden" value="" id="" name="">' . $row[0] . '</td>
                //         <td> <input type="hidden" value="" id="" name="">' . $row[0] . '</td>
                //         <td> <input type="hidden" value="" id="" name="">' . $row[0] . '</td>
                //         <td> <input type="hidden" value="" id="" name="">' . $row[0] . '</td>
                //         <td> <input type="hidden" value="" id="" name="">' . $row[0] . '</td>
                //         <td> <button>Edit</button> <button>Update</button></td>
                //         </tr>';
                // }

                ?>

            </table>

        </div>

        <div class="container-fluid">
            <div class="item-list2">

                <div class="item">
                    <p class="name">Total</p>
                    <input type="number" id="total_2" name="total_2" readonly value="<?php echo $billData['total']; ?>">
                </div>

                <div class="item">
                    <p class="name">Discount</p>
                    <input type="number" id="dis_2" name="dis_2" value="<?= $billData['discount'] ?>">
                </div>

                <div class="item">
                    <p class="name">Discount %</p>
                    <input type="number" id="disper_2" name="disper_2" value="<?= $billData['discountPer'] ?>">
                </div>

                <div class="item">
                    <p class="name">Net total</p>
                    <input type="number" id="net_total" name="net_total" value="<?= $billData['netTotal'] ?>">

                </div>
            </div>

        </div>


        <br>
        <br>
        <input type="number" name="billNo" id="billNo">
        <br>
        <br>

        <button type="submit">Search</button>
        <br>
        <br>


        <button type="button" onclick="updateData()">Update</button>
    </form>

    <script src="main.js"></script>
</body>

</html>
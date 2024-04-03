<?php
// print_r($_POST);
include 'config/database.php';


$data = $_POST;

$billNo = $data['billNo'];

// die();

// Deleting Data
$dataDelete = "DELETE FROM `invoicedata` WHERE billNo = '$billNo'";
$qryDelete = mysqli_query($conn, $dataDelete);

if ($qryDelete) {
    $detailsDelete = "DELETE FROM `invoicedetails` WHERE billNo = '$billNo'";
    $qryDelete2 = mysqli_query($conn, $detailsDelete);
} else {
    echo "Error";
}




// array
$array = $_POST;



// object
$object = (object)$array;

$numrow = $_POST['numrow'];

for ($i = 1; $i <= $numrow; $i++) {

    $itemName = $_POST['name' . $i];

    $itemPrice = $_POST['price' . $i];

    $itemQty = $_POST['qty' . $i];

    $itemTotal = $_POST['total' . $i];

    $itemDis = $_POST['dis' . $i];

    $itemDisper = $_POST['disper' . $i];

    $itemNetTotal = $_POST['nettotal' . $i];



    // query to insert item data
    $detailsData = "INSERT INTO `invoicedetails`(`billNo`,`name`,`price`,`qty`,`total`,`discount`,`disper`,`netTotal`) VALUES ('$billNo','$itemName','$itemPrice','$itemQty','$itemTotal','$itemDis','$itemDisper','$itemNetTotal')";


    $detailsInsert = mysqli_query($conn, $detailsData);
}


$billTotal = $_POST['total_2'];
$billDis = $_POST['dis_2'];
$billDisPer = $_POST['disper_2'];
$billNetTotal = $_POST['net_total'];

$billQuery = "INSERT INTO `invoicedata`(`billNo`, `total`, `discount`, `discountPer`, `netTotal`) VALUES ('$billNo','$billTotal','$billDis','$billDisPer','$billNetTotal')";
$billInsert = mysqli_query($conn, $billQuery);

if ($billInsert) {
    echo "Success";
} else {
    echo "Error";
}

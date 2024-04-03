<?php
//Update

//Deleting existing rows

//
$dataDelete = "DELETE FROM `invoicedata` WHERE billNo = '$billNo'";

$rowDeleted = mysqli_query($conn, $dataDelete);

if ($rowDeleted) {
    echo "Deleted";
} else {
    echo "Error";
}

$detailsDelete = "DELETE FROM `invoicedetails` WHERE billNo = '$billNo'";

$rowDeleted = mysqli_query($conn, $detailsDelete);

if ($rowDeleted) {
    echo "Deleted";
} else {
    echo "Error";
}



// array
$array = $_POST;
// print_r($array);
echo "<br>";
echo "<br>";
// echo $itemName = $_POST['name1'];

echo "<br>";



// object
$object = (object)$array;

// print_r($object);

// echo "<br>";
// echo "<br>";
// echo $itemName = $object->name1;

// echo "<br>";
// echo "<br>";




$billNo = $_POST['billNo'];

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

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

    if ($detailsInsert) {
        echo "Data Saved";
    } else {
        echo "Error";
    }
}





$billTotal = $_POST['total_2'];
$billDis = $_POST['dis_2'];
$billDisPer = $_POST['disper_2'];
$billNetTotal = $_POST['net_total'];


// including DB file


$billQuery = "INSERT INTO `invoicedata`(`billNo`, `total`, `discount`, `discountPer`, `netTotal`) VALUES ('$billNo','$billTotal','$billDis','$billDisPer','$billNetTotal')";
$billInsert = mysqli_query($conn, $billQuery);

if ($billInsert) {
    echo "Invoice Saved";
    // header("Location: http://localhost/table/search.php");
    // die();
} else {
    echo "Error";
}

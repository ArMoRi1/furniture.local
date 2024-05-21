<?php

include('../../include/config.php');
include('../../include/function.php');

$id = $_POST['id'];

$usersurname = stripslashes(htmlspecialchars(trim($_POST['usersurname'])));
$username = stripslashes(htmlspecialchars(trim($_POST['username'])));
//$email = stripslashes(htmlspecialchars(trim($_POST['email'])));
$address = stripslashes(htmlspecialchars(trim($_POST['address'])));
$productid = stripslashes(htmlspecialchars(trim($_POST['productid'])));
$orderDate = stripslashes(htmlspecialchars(trim($_POST['orderDate'])));
$status = stripslashes(htmlspecialchars(trim($_POST['status'])));



$query = "UPDATE `orders` SET
            `usersurname` = '$usersurname',
            `username` = '$username',
            `address` = '$address',
            `productid` = '$productid',
            `orderDate` = '$orderDate',
            `status` = '$status'
          WHERE `id` =".$id;

if (mysqli_query($conn, $query)) {
    header('Location: ../index.php');
    mysqli_close($conn);
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>

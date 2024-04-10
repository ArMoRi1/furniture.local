<?php
include ("./include/config.php");
include ("./include/function.php");
global $conn;

$firstname = mysqli_real_escape_string($conn,trim(strip_tags(stripcslashes(htmlspecialchars($_POST['usersurname'])))));
$lastname = mysqli_real_escape_string($conn, trim(strip_tags(stripcslashes(htmlspecialchars($_POST['username'])))));
$phonenumber= mysqli_real_escape_string($conn, trim(strip_tags(stripcslashes(htmlspecialchars($_POST['phonenumber'])))));
$email= mysqli_real_escape_string($conn, trim(strip_tags(stripcslashes(htmlspecialchars($_POST['email'])))));
$address = mysqli_real_escape_string($conn, trim(strip_tags(stripcslashes(htmlspecialchars($_POST['address'])))));
$productid = mysqli_real_escape_string($conn, trim(strip_tags(stripcslashes(htmlspecialchars($_POST['productid'])))));

date_default_timezone_set('America/Detroit');

$orderDate = date('d/m/Y H:i');

$sql = "INSERT INTO `orders` (id, usersurname, username, phonenumber, email, address, productid,orderDate, status) VALUES (NULL, '$firstname', '$lastname', '$phonenumber', '$email', '$address', '$productid','$orderDate', '1')";

if (mysqli_query($conn, $sql)) {
    header('Location: thx.php');
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
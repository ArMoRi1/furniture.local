<?php
include ("./include/config.php");
include ("./include/function.php");
global $conn;

$firstname = mysqli_real_escape_string($conn,trim(strip_tags(stripcslashes(htmlspecialchars($_POST['firstname'])))));
$lastname = mysqli_real_escape_string($conn, trim(strip_tags(stripcslashes(htmlspecialchars($_POST['lastname'])))));
$phonenumber= mysqli_real_escape_string($conn, trim(strip_tags(stripcslashes(htmlspecialchars($_POST['phonenumber'])))));
$email= mysqli_real_escape_string($conn, trim(strip_tags(stripcslashes(htmlspecialchars($_POST['email'])))));
$address = mysqli_real_escape_string($conn, trim(strip_tags(stripcslashes(htmlspecialchars($_POST['address'])))));
$product = mysqli_real_escape_string($conn, trim(strip_tags(stripcslashes(htmlspecialchars($_POST['products'])))));

$sql = "INSERT INTO `orders` (id, firstname, lastname, phonenumber, email, address, product) VALUES (NULL, '$firstname', '$lastname', '$phonenumber', '$email', '$address', '$product')";

if (mysqli_query($conn, $sql)) {
    header('Location: thx.php');
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
<?php
//include ("./include/config.php");
//include ("./include/function.php");
//global $conn;
//
//$firstname = mysqli_real_escape_string($conn,trim(strip_tags(stripcslashes(htmlspecialchars($_POST['usersurname'])))));
//$lastname = mysqli_real_escape_string($conn, trim(strip_tags(stripcslashes(htmlspecialchars($_POST['username'])))));
//$phonenumber= mysqli_real_escape_string($conn, trim(strip_tags(stripcslashes(htmlspecialchars($_POST['phonenumber'])))));
//$email= mysqli_real_escape_string($conn, trim(strip_tags(stripcslashes(htmlspecialchars($_POST['email'])))));
//$address = mysqli_real_escape_string($conn, trim(strip_tags(stripcslashes(htmlspecialchars($_POST['address'])))));
//$productid = mysqli_real_escape_string($conn, trim(strip_tags(stripcslashes(htmlspecialchars($_POST['productid'])))));
//
//date_default_timezone_set('America/Detroit');
//
//$orderDate = date('d/m/Y H:i');
////
////$sql = "INSERT INTO `orders` (id, usersurname, username, phonenumber, email, address, productid,orderDate, status) VALUES (NULL, '$firstname', '$lastname', '$phonenumber', '$email', '$address', '$productid','$orderDate', '1')";
////
////if (mysqli_query($conn, $sql)) {
////    header('Location: thx.php');
////    exit();
////} else {
////    echo "Error: " . mysqli_error($conn);
////}
//
////------------
//
//$orderId = $_GET['order_id'];
//$order = getOrderById($orderId);
//$productId = $order[0]['productid'];
//$mysqli = new mysqli("localhost", "root", "", "furnituredb");
//
//// Перевірка підключення
//if ($mysqli->connect_error) {
//    die("Підключення не вдалося: " . $mysqli->connect_error);
//}
//
//// Початок транзакції
//$mysqli->begin_transaction();
//
//$query1 = "INSERT INTO `orders` (id, usersurname, username, phonenumber, email, address, productid,orderDate, status) VALUES (NULL, '$firstname', '$lastname', '$phonenumber', '$email', '$address', '$productid','$orderDate', '1')";
//$query2 = "UPDATE `furniture` SET `numberOfGood` = `numberOfGood` - 1 WHERE `id` = $productId";
//
//// Виконання першого запиту
//if ($mysqli->query($query1) === TRUE) {
//    // Виконання другого запиту
//    if ($mysqli->query($query2) === TRUE) {
//        // Підтвердження транзакції, якщо обидва запити успішні
//        $mysqli->commit();
//        header('Location: ../userProfile.php');
//        exit();
//    } else {
//        // Відкат транзакції у разі помилки другого запиту
//        $mysqli->rollback();
//        echo "Помилка виконання другого запиту: " . $mysqli->error;
//    }
//} else {
//    // Відкат транзакції у разі помилки першого запиту
//    $mysqli->rollback();
//    echo "Помилка виконання першого запиту: " . $mysqli->error;
//}
//
//// Закриття з'єднання
//$mysqli->close();

include ("./include/config.php");
include ("./include/function.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    global $conn;

    // Захист від SQL-ін'єкцій та фільтрація вводу
    $firstname = mysqli_real_escape_string($conn, trim(strip_tags(stripslashes(htmlspecialchars($_POST['usersurname'])))));
    $lastname = mysqli_real_escape_string($conn, trim(strip_tags(stripslashes(htmlspecialchars($_POST['username'])))));
    $phonenumber = mysqli_real_escape_string($conn, trim(strip_tags(stripslashes(htmlspecialchars($_POST['phonenumber'])))));
    $email = mysqli_real_escape_string($conn, trim(strip_tags(stripslashes(htmlspecialchars($_POST['email'])))));
    $address = mysqli_real_escape_string($conn, trim(strip_tags(stripslashes(htmlspecialchars($_POST['address'])))));
    $productid = mysqli_real_escape_string($conn, trim(strip_tags(stripslashes(htmlspecialchars($_POST['productid'])))));

    date_default_timezone_set('America/Detroit');
    $orderDate = date('d/m/Y H:i');

//    $orderId = $_POST['order_id'];
//    $order = getOrderById($orderId);
//    $productId = $_GET['furniture_id'];

    $mysqli = new mysqli("localhost", "root", "", "furnituredb");

    // Перевірка підключення
    if ($mysqli->connect_error) {
        die("Підключення не вдалося: " . $mysqli->connect_error);
    }

    // Початок транзакції
    $mysqli->begin_transaction();

    $query1 = "INSERT INTO `orders` (id, usersurname, username, phonenumber, email, address, productid, orderDate, status) VALUES (NULL, '$firstname', '$lastname', '$phonenumber', '$email', '$address', '$productid', '$orderDate', '1')";
    $query2 = "UPDATE `furniture` SET `numberOfGood` = `numberOfGood` - 1 WHERE `id` = $productid";

    // Виконання першого запиту
    if ($mysqli->query($query1) === TRUE) {
        // Виконання другого запиту
        if ($mysqli->query($query2) === TRUE) {
            // Підтвердження транзакції, якщо обидва запити успішні
            $mysqli->commit();
            header('Location: index.php');
            exit();
        } else {
            // Відкат транзакції у разі помилки другого запиту
            $mysqli->rollback();
            echo "Помилка виконання другого запиту: " . $mysqli->error;
        }
    } else {
        // Відкат транзакції у разі помилки першого запиту
        $mysqli->rollback();
        echo "Помилка виконання першого запиту: " . $mysqli->error;
    }

    // Закриття з'єднання
    $mysqli->close();
}
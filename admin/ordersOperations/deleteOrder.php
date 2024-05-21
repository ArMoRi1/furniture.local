<?php
session_start();
include('../../include/config.php');
include('../../include/function.php');

$rolee = GetRoleUsingEmail($_SESSION['email']);

if('6' == $rolee){
    header('location: ../login/login.php');
}

$servername = "localhost";
$username = "root";
$password = "";
$db = 'furnituredb';
$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}

//$post_id = $_GET['post_id'];

// Отримати інформацію про новину, щоб показати перед підтвердженням видалення
$sql = "SELECT * FROM orders WHERE id =" . $_GET['order_id'];
$result = mysqli_query($conn, $sql);
$order = mysqli_fetch_assoc($result);

if (!$order) {
    // Якщо новина не знайдена, перенаправити на головну сторінку адмін-панелі
    header("Location:../index.php");
    exit();
}

//var_dump($folderPath);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Видалення запису з бази даних
    mysqli_query($conn, "DELETE FROM orders WHERE id =".$_GET['order_id']);

    // Перенаправлення на головну сторінку адмін-панелі
    header("Location: ../index.php");
    exit();
}
?>

<!doctype html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Підтвердження видалення</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/main.css">
    <style>
        body{
            font-family: Verdana, Arial, Helvetica, Sans-Serif;
            background-color: #f7d692;
            font-family: Arial;
            text-decoration: none;
        }
    </style>
</head>
<body class="admin">
<div class="container-delete container ">
    <h2 class="delete_title">Ви впевнені, що хочете видалити  наступне замовлення?</h2>
    <div class="card">
        <div class="card-body">
            <p class="card-title"><b>Замовлення</b> #<?= $order['id']?></p>
            <p class="card-karkass"><b>Номер товару :</b> <?=$order['productid']?> </p>
            <p class="card-text"><b>Email замовника:</b><br><?=$order['email']?></p>
            <form method="POST" action="">
                <input type="hidden" name="post_id" value="<?=$_GET['order_id']?>">
                <button type="submit" class="btn btn-danger">Видалити</button>
                <a href="../index.php" class="btn btn-secondary">Скасувати</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>

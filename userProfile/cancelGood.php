<?php
//include('../header.php');
$servername = "localhost";
$username = "root";
$password = "";
$db = 'furnituredb';
$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}
$orderId = $_GET['order_id'];

// Отримати інформацію про новину, щоб показати перед підтвердженням видалення
//$sql = 'SELECT * FROM orders WHERE id = '.$orderId;
//$result = mysqli_query($conn, $sql);
//$order = mysqli_fetch_assoc($result);
//var_dump($sql);
?>

<!doctype html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Підтвердження відміни замовлення</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">

</head>
<style>
    body{
        font-family: Verdana, Arial, Helvetica, Sans-Serif;
        background-color: #f7d692;
        font-family: Arial;
        text-decoration: none;
        display: flex;
        align-items: center;
    }
</style>
<body class="admin">
<div class="container-delete container">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="">
                <h2 class="delete_title">Ви впевнені, що хочете відмінити замволення?</h2>
                <input type="hidden" name="post_id" value="<?=$orderId?>">
                <button type="submit" class="btn btn-danger">Відмінити</button>
                <a href="../index.php" class="btn btn-secondary">Скасувати</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>

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
?>
<!doctype html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редагування користувача</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <style>
        body{
            font-family: Verdana, Arial, Helvetica, Sans-Serif;
            background-color: #f7d692;
            font-family: Arial;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">

    <div class="col-12">
        <?php
        $order_id = $_GET['order_id'];
        $sql = "SELECT * FROM orders WHERE id =".$order_id;
        $result = mysqli_query($conn, $sql);
        $order = mysqli_fetch_assoc($result);
        ?>
        <form action="updateOrder.php" method="post" enctype="multipart/form-data" style="text-align: left">
            <input type="hidden" class="form-control" name="id"
                   value="<?=$order['id']?>" required>
            <div class="col">
                <h3>Редагувати замовлення</h3>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Прізвище замовника<span style="color:red;">*</span></label>
                <input  name="usersurname" type="text" class="form-control"
                       id="exampleFormControlInput1" required value="<?php echo $order['usersurname'];?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Ім'я замовника<span style="color:red;">*</span></label>
                <input name="username" type="text" class="form-control"
                       id="exampleFormControlInput1" required value="<?php echo $order['username'];?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email замовника<span style="color:red;">*</span></label>
                <input disabled name="email" type="email" class="form-control"
                       id="exampleFormControlInput1" required value="<?php echo $order['email'];?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Адреса замовника<span style="color:red;">*</span></label>
                <input name="address" type="text" class="form-control"
                       id="exampleFormControlInput1" required value="<?php echo $order['address'];?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Номер товару<span style="color:red;">*</span></label>
                <input name="productid" type="text" class="form-control"
                       id="exampleFormControlInput1" required value="<?php echo $order['productid'];?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Дату замовлення<span style="color:red;">*</span></label>
                <input name="orderDate" type="text" class="form-control"
                       id="exampleFormControlInput1" required value="<?php echo $order['orderDate'];?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Статус замовлення<span style="color:red;">*</span></label>
                <select name="status" type="text" class="form-control" id="exampleFormControlInput1" required>
                    <option value disabled selected hidden>Виберіть статус</option>
                    <?php

                    $statuses = getStatuses();
                    foreach($statuses as $status):?>
                        <option <?php if($order['status'] === $status['id']):?> selected <?php endif;?>
                                value="<?php echo $status['id']; ?>"><?php echo $status['status']; ?></option>

                    <?php endforeach;?>
                </select>

            </div>
           <?php

           ?>
            <button type="submit" class="btn btn-primary">Редагувати</button>
            <a href="../index.php" class="btn btn-secondary">Скасувати</a>
        </form>
    </div>
</div>
</body>
</html>
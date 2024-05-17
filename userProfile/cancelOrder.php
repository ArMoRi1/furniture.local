<?php
include('../include/config.php');
include('../include/function.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $orderId = $_GET['order_id'];
    $order = getOrderById($orderId);
    $productId = $order[0]['productid'];
    $mysqli = new mysqli("localhost", "root", "", "furnituredb");

    // Перевірка підключення
    if ($mysqli->connect_error) {
        die("Підключення не вдалося: " . $mysqli->connect_error);
    }

    // Початок транзакції
    $mysqli->begin_transaction();

    $query1 = "UPDATE `furniture` SET `numberOfGood` = `numberOfGood` + 1 WHERE `id` = $productId";
    $query2 = "UPDATE `orders` SET `status` = 6 WHERE `id` = $orderId";

    // Виконання першого запиту
    if ($mysqli->query($query1) === TRUE) {
        // Виконання другого запиту
        if ($mysqli->query($query2) === TRUE) {
            // Підтвердження транзакції, якщо обидва запити успішні
            $mysqli->commit();
            header('Location: ../userProfile.php');
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
?>

<!doctype html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Підтвердження відміни замовлення</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<style>
    body {
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
                <button type ="submit" class="btn btn-danger">Відмінити</button>
                <a href="../userProfile.php" class="btn btn-secondary">Скасувати</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>

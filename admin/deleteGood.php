<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = 'furnituredb';
$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}

$post_id = $_GET['post_id'];

// Отримати інформацію про новину, щоб показати перед підтвердженням видалення
$sql = "SELECT * FROM furniture WHERE id =" . $post_id;
$result = mysqli_query($conn, $sql);
$post = mysqli_fetch_assoc($result);

$filePath = $post['img1'];
$folderPath = '../'.dirname($filePath);

if (!$post) {
    // Якщо новина не знайдена, перенаправити на головну сторінку адмін-панелі
    header("Location: index.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Видалення папки разом із файлами
    if (is_dir($folderPath)) {
        delete_folder($folderPath);
    }

    // Видалення запису з бази даних
    mysqli_query($conn, "DELETE FROM furniture WHERE id = $post_id");

    // Перенаправлення на головну сторінку адмін-панелі
    header("Location: index.php");
    exit();
}

// Функція для рекурсивного видалення папки разом із файлами
function delete_folder($dir) {
    $files = glob($dir . '/*');
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        } elseif (is_dir($file)) {
            delete_folder($file);
        }
    }
    rmdir($dir);
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
<body class="admin">
<div class="container">
    <h2 class="delete_title">Ви впевнені, що хочете видалити наступну новину?</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?=$post['name']?></h5>
            <p class="card-karkass">
                <img src="../<?= $post['img1']?>" alt="...">
            </p>
            <p class="card-text"><?=$post['content']?></p>
            <form method="POST" action="">
                <input type="hidden" name="post_id" value="<?=$post_id?>">
                <button type="submit" class="btn btn-danger">Видалити</button>
                <a href="index.php" class="btn btn-secondary">Скасувати</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>

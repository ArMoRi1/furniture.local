<?php
session_start();
include('../include/config.php');
include('../include/function.php');

if('1' !== GetRoleUsingEmail($_SESSION['email'])){
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
    <title>Редагування новини</title>
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
            $furniture_id = $_GET['post_id'];
            $sql = "SELECT * FROM furniture WHERE id =".$furniture_id;;
            $result = mysqli_query($conn, $sql);
            $post = mysqli_fetch_assoc($result);
            ?>
            <div class="col">
                <h3>Редагування інформації</h3>
            </div>
            <form action="updateGood.php" method="post"
                  enctype="multipart/form-data" style="text-align: left;">
                <input type="hidden" class="form-control" name="id"
                       value="<?=$post['id']?>" required>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Змінити назву меблів</label>
                    <input name="name" type="text" class="form-control" id="exampleFormControlInput1"
                       value="<?=$post['name']?>" required>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">Змінити зображення 1-ше</label>
                    <input name="img1" type="file" id="exampleFormControlFile1" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Змінити зображення 2-ге</label>
                    <input name="img2" type="file" id="exampleFormControlFile1" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Змінити зображення 3-тє</label>
                    <input name="img3" type="file" id="exampleFormControlFile1" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Змінити відео</label>
                    <input name="video" type="file" id="exampleFormControlFile1" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Змінити розмір для меблів</label>
                    <input name="size" type="text" class="form-control" id="exampleFormControlFile1"
                           value="<?=$post['size']?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Змінити каркас меблів</label>
                    <input name="karkass" type="text" class="form-control" id="exampleFormControlFile1"
                           value="<?=$post['karkass']?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Змінити наповнення меблів</label>
                    <input name="filling" type="text" class="form-control" id="exampleFormControlFile1"
                           value="<?=$post['filling']?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Змінити спальну площу меблів</label>
                    <input name="bedsquare" type="text" class="form-control" id="exampleFormControlFile1"
                           value="<?=$post['bedsquare']?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Змінити тип меблів</label>
                    <input name="category" type="text" class="form-control" id="exampleFormControlFile1"
                           value="<?=$post['category']?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Вкажіть кількість</label>
                    <input name="numberOfGood" type="text" class="form-control" id="exampleFormControlInput1"
                           value="<?=$post['numberOfGood']?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Відредагуйте текст опису меблів</label>
                    <textarea name="content" class="form-control"
                              id="exampleFormControlTextarea1" rows="6">
                        <?=$post['content']?> required</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Змінити ціну меблів</label>
                    <input name="price" type="text" class="form-control" id="exampleFormControlFile1"
                           value="<?=$post['price']?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Обновити інформацію</button>
                <a href="index.php" class="btn btn-secondary">Скасувати</a>
            </form>
        </div>
</div>
</body>
</html>
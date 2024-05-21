<?php
session_start();
include('../include/config.php');
include('../include/function.php');

$rolee = GetRoleUsingEmail($_SESSION['email']);

if('6' == $rolee){
    header('location: ../login/login.php');
}
?>
<!doctype html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0>
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Додавання меблів</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
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

        <form action="checkGood.php" method="post" enctype="multipart/form-data" style="text-align: left">
            <div class="col">
                <h3>Додавання меблів</h3>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Вкажіть назву меблів<span style="color:red;">*</span></label>
                <input name="name" type="text" class="form-control"
                       id="exampleFormControlInput1" required>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Виберіть 1-ше зображення<span style="color:red;">*</span></label>
                <input name="img1" type="file"
                       id="exampleFormControlInput1" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Виберіть 2-ге зображення</label>
                <input name="img2" type="file"
                       id="exampleFormControlInput1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Виберіть 3-тє зображення</label>
                <input name="img3" type="file"
                       id="exampleFormControlInput1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Виберіть відео</label>
                <input name="video" type="file"
                       id="exampleFormControlInput1" >
            <div class="form-group">
                <label for="exampleFormControlInput1">Вкажіть розміри<span style="color:red;">*</span></label>
                <input name="size" type="text" class="form-control"
                       id="exampleFormControlInput1" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Вкажіть матеріал(и) каркасу<span style="color:red;">*</span></label>
                <input name="karkass" type="text" class="form-control"
                       id="exampleFormControlInput1" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Вкажіть наповнення<span style="color:red;">*</span></label>
                <input name="filling" type="text" class="form-control"
                       id="exampleFormControlInput1" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Вкажіть спальна площа<span style="color:red;">*</span></label>
                <input name="bedsquare" type="text" class="form-control"
                       id="exampleFormControlInput1" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Вкажіть номер категорії<span style="color:red;">*</span></label>
                <input name="category" type="text" class="form-control"
                       id="exampleFormControlInput1" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Вкажіть кількість</span></label>
                <input name="numberOfGood" type="text" class="form-control"
                       id="exampleFormControlInput1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Вкажіть опис меблів<span style="color:red;">*</span></label>
                <textarea name="content" class="form-control"
                          id="exampleFormControlTextarea1" rows="6" required></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Вкажіть ціну меблів<span style="color:red;">*</span></label>
                <input name="price" type="text" class="form-control"
                       id="exampleFormControlInput1" required>
            </div>

            <button type="submit" class="btn btn-primary">Додати товар</button>
            <a href="index.php" class="btn btn-secondary">Скасувати</a>
        </form>
    </div>
</div>
</body>
</html>
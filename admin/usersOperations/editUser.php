<?php
session_start();
include('../../include/config.php');
include('../../include/function.php');

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
        $user_id = $_GET['user_id'];
        $sql = "SELECT * FROM users WHERE id =".$user_id;;
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
        ?>
        <form action="updateUser.php" method="post" enctype="multipart/form-data" style="text-align: left">
            <input type="hidden" class="form-control" name="id"
                   value="<?=$user['id']?>" required>
            <div class="col">
                <h3>Редагувати користувача</h3>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Вкажіть прізвище<span style="color:red;">*</span></label>
                <input  name="usersurname" type="text" class="form-control"
                       id="exampleFormControlInput1" required value="<?php echo $user['usersurname'];?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Вкажіть ім'я<span style="color:red;">*</span></label>
                <input name="username" type="text" class="form-control"
                       id="exampleFormControlInput1" required value="<?php echo $user['username'];?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Вкажіть Email<span style="color:red;">*</span></label>
                <input name="email" type="email" class="form-control"
                       id="exampleFormControlInput1" required value="<?php echo $user['email'];?>">
            </div>
<!--            <div class="form-group">-->
<!--                <label for="exampleFormControlInput1">Вкажіть пароль<span style="color:red;">*</span></label>-->
<!--                <input name="password" type="text" class="form-control"-->
<!--                       id="exampleFormControlInput1" required value="--><?php //echo $user['password'];?><!--">-->
<!--            </div>-->
            <div class="form-group">
                <label for="exampleFormControlInput1">Вкажіть роль<span style="color:red;">*</span></label>
                <select name="rolee" type="text" class="form-control" id="exampleFormControlInput1" required>
                    <option value disabled selected hidden>Виберіть роль</option>
                    <?php

                    $rolees = get_rolees();
                    foreach($rolees as $rolee):?>
                        <option <?php if($rolee['id'] === $user['rolee']):?> selected <?php endif;?>
                                value="<?php echo $rolee['id']; ?>"><?php echo $rolee['roleeName']; ?></option>

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
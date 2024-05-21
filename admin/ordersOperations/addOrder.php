<?php
session_start();
include('../../include/config.php');
include('../../include/function.php');

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
          content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Додавання користувача</title>
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

        <form action="checkOrder.php" method="post" enctype="multipart/form-data" style="text-align: left">
            <div class="col">
                <h3>Додати Замовлення</h3>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Вкажіть прізвище<span style="color:red;">*</span></label>
                <input name="usersurname" type="text" class="form-control"
                       id="exampleFormControlInput1" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Вкажіть ім'я<span style="color:red;">*</span></label>
                <input name="username" type="text" class="form-control"
                       id="exampleFormControlInput1" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Вкажіть Email<span style="color:red;">*</span></label>
                <input name="email" type="email" class="form-control"
                       id="exampleFormControlInput1" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Вкажіть пароль<span style="color:red;">*</span></label>
                <input name="password" type="text" class="form-control"
                       id="exampleFormControlInput1" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Вкажіть роль<span style="color:red;">*</span></label>
                <select name="rolee" type="text" class="form-control" id="exampleFormControlInput1" required>
                    <option value disabled selected hidden>Виберіть роль</option>
                    <?php
                    $rolees = get_rolees();
                    foreach($rolees as $rolee):

                        ?>
                        <option value="<?php echo $rolee['id']; ?>"><?php echo $rolee['roleeName']; ?></option>
                    <?php endforeach;?>
                </select>

            </div>
            <button type="submit" class="btn btn-primary">Додати товар</button>
            <a href="../index.php" class="btn btn-secondary">Скасувати</a>
        </form>
    </div>
</div>
</body>
</html>
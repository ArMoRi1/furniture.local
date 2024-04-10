<?php
session_start();
include ("../include/config.php");
include ("../include/function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7d692;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;

        }

        .login-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;

        }

        h3 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 16px;

        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .btn:hover {
            background-color: #45a049;
        }
        .register-link {
            font-size: 16px;

            text-decoration: none;
        }

        .register-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="login-form">
        <form class="login" action="check-user.php" method="post">
            <h3>Вхід</h3>
<!--            --><?php
//            // Виводимо повідомлення, якщо воно існує
//            if (isset($_SESSION['messageOnPage'])) {
//                echo '<div class="form-group err">
//              <p>' . $_SESSION['messageOnPage'] . '</p>
//          </div>';
//
//                // Очищаємо повідомлення відразу після виведення (якщо бажаєте)
//                unset($_SESSION['messageOnPage']);
//            }
//            ?>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input required type="email" name="email" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input required type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn">Увійти</button>
        </form>
        <p>Не маєте акаунту?<a href="registration.php" class="register-link"> Реєструйтесь тут.</a></p>
    </div>
</div>

</body>
</html>



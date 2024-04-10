<?php
session_start();
//$messageOnPage = $_SESSION['messageOnPage'];
include ("../include/config.php");
include ("../include/function.php");
//require ("add-user.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
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

        .register-form {
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
         .err{
             border-radius: 8px;
             padding: 5px 10px;
             background-color: pink;
             color:red;
             outline: 2px solid red;
        }
         .good{
             border-radius: 8px;
             padding: 5px 10px;
             background-color: #2dbd56;
             color:#168c38;
             outline: 2px solid #168c38;
         }



    </style>
</head>
<body>

<div class="container">
    <div class="register-form">
        <form class="registration" action="add-user.php" method="post">
            <h3>Реєстрація</h3>
            <?php
            // Виводимо повідомлення, якщо воно існує
            if (isset($_SESSION['messageOnPage'])) {
                echo '<div class="form-group err">
              <p>' . $_SESSION['messageOnPage'] . '</p>
          </div>';
                // Очищаємо повідомлення відразу після виведення (якщо бажаєте)
                unset($_SESSION['messageOnPage']);
            }
            ?>
            <div class="form-group">
                <label for="usersurname">Прізвище користувача</label>
                <input type="text" name="usersurname" class="form-control" id="usersurname" required>
            </div>
            <div class="form-group">
                <label for="username">Ім'я користувача</label>
                <input type="text" name="username" class="form-control" id="username" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <button type="submit" class="btn">Зареєструватися</button>
        </form>
    </div>
</div>

</body>
</html>

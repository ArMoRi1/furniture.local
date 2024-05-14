<?php
session_start();
//if (isset($_POST['submit'])){
    $messageOnPage = '';
    $servername = "localhost";
    $usernameDB = "root";
    $passwordDB = "";
    $db = 'furnituredb';
    $conn = mysqli_connect($servername, $usernameDB, $passwordDB, $db);
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    $usersurname = stripslashes(htmlspecialchars(trim($_POST['usersurname'])));
    $username = stripslashes(htmlspecialchars(trim($_POST['username'])));
    $email = stripslashes(htmlspecialchars(trim($_POST['email'])));
    $password = stripslashes(htmlspecialchars(trim($_POST['password'])));
    $avatar = "../img/database/usersAvatars/userImg-basic.png";

    if(empty($_POST['rolee'])){
        $rolee= '1';

    }else{
        $rolee = $_POST['rolee'];

    }
    if(mb_strlen($username, "UTF-8") < 2){
        $messageOnPage = "Недопустима довжина прізвища!";
    }
    else if(mb_strlen($usersurname, "UTF-8") < 2 || mb_strlen($usersurname, "UTF-8") > 60){
        $messageOnPage = "Недопустима довжина прізвища!";
    }
    else if(mb_strlen($username, "UTF-8") < 2 || mb_strlen($username, "UTF-8") > 60){
        $messageOnPage = "Недопустима довжина імені!";
    }
    else if(mb_strlen($email, "UTF-8") < 2 || mb_strlen($email, "UTF-8") > 100){
        $messageOnPage = "Недопустима довжина email`а!";
    }
    else if(mb_strlen($password, "UTF-8") < 8 || mb_strlen($password, "UTF-8") > 60){
        $messageOnPage = "Недопустима довжина паролю!(від 8-ми символів)";
    }

    $password = md5($password . "kjs2gfs9kd7g");

    $mysql = new mysqli($servername,$usernameDB,$passwordDB,$db);

    $check_query = "SELECT * FROM users WHERE email = '$email'";
    $result = $mysql->query($check_query);
if ($result->num_rows > 0) {
    $messageOnPage = "Користувач з такою електронною адресою вже існує.";
} else {
    $insert_query = $mysql->query("INSERT INTO `users` (`usersurname`, `username`, `email`, `password`, `rolee`, `avatar`) VALUES ('$usersurname', '$username', '$email', '$password', '$rolee', '$avatar')");
    if (($insert_query) === TRUE) {
        header('Location: ../login/login.php');
    } else {
        $messageOnPage = "Помилка створення користувача!";
    }
}

//echo $messageOnPage;
$mysql->close();
$_SESSION['messageOnPage'] = $messageOnPage;
if(($_SESSION['messageOnPage'] === '') && ($_SESSION['rolee']) == 1){
    header('Location: ../admin/index.php');
} elseif (($_SESSION['messageOnPage'] === '') && (!$_SESSION['rolee'])){
        header('Location: ../login/login.php');
} else{
    header('Location: ../login/registration.php');
}

//if(($_SESSION['messageOnPage'] === '') && (!empty($_SESSION))) {
////    header('Location: ../login/login.php');
//    header('Location: ../admin/index.php');
////}else if(($_SESSION['messageOnPage'] === '') && (empty($_SESSION)){
////        header('Location: ../login/registration.php');
////} else{
//}
?>
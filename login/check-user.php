<?php
session_start();
$servername = "localhost";
$usernameDB = "root";
$passwordDB = "";
$db = 'furnituredb';
$conn = mysqli_connect($servername, $usernameDB, $passwordDB, $db);
if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}

$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

$password = md5($password."kjs2gfs9kd7g");

$mysql = new mysqli($servername,$usernameDB,$passwordDB,$db);
$result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
global $user;
$user = $result->fetch_assoc();

if($user === NULL){
    echo "Користувач не знайдений!";
    exit();
}
echo print_r($user);
$_SESSION['avatar'] = $user['avatar'];
$_SESSION['usersurname'] = $user['usersurname'];
$_SESSION['username'] = $user['username'];
$_SESSION['user'] = $user['usersurname']." ".$user['username'];
$_SESSION['email'] = $user['email'];
$_SESSION['rolee'] = $user['rolee'];
//var_dump($_SESSION);
//echo $_SESSION['email'];
//$_SESSION['expire_time'] = time() + 3600;
//setcookie('user',$user['usersurname'].$user['username'], time()+3600, '/');
$mysql->close();

header('Location: ../index.php');


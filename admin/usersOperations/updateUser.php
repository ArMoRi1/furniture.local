<?php

include('../../include/config.php');
include('../../include/function.php');

$id = $_POST['id'];

$usersurname = stripslashes(htmlspecialchars(trim($_POST['usersurname'])));
$username = stripslashes(htmlspecialchars(trim($_POST['username'])));
$email = stripslashes(htmlspecialchars(trim($_POST['email'])));
$password = stripslashes(htmlspecialchars(trim($_POST['password'])));
$rolee= stripslashes(htmlspecialchars(trim($_POST['rolee'])));

$query = "UPDATE `users` SET
            `usersurname` = '$usersurname',
            `username` = '$username',
            `email` = '$email',
            `password` = '$password',
            `rolee` = '$rolee'
          WHERE `users`.`id` =".$id;

if (mysqli_query($conn, $query)) {
    header('Location: ../index.php');
    mysqli_close($conn);
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>

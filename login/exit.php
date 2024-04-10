
<?php
//    setcookie('user',$user['usersurname'].$user['username'], time()-3600, '/');
session_start();
unset($_SESSION['user']);
unset($_SESSION['usersurname']);
unset($_SESSION['username']);
unset($_SESSION['user']);

unset($_SESSION['email']);
header('Location: ../index.php');
?>

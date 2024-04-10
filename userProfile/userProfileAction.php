<?php
session_start();
include('../include/config.php');
include('../include/function.php');



$id = GetIDUsingEmail($_SESSION['email']);

$imgAvatardb = getIMGAvatarFromDatabase('avatar',$id);
$files = glob('../img/database/usersAvatars/'.$id.'/*');
$allowedTypes = array('image/jpeg, image/jfif, image/png, image/gif, image/bmp, image/tiff, image/webp');

//if(in_array($_FILES['imgProfile']['type'], $allowedTypes)){
//
//}
//else{
//    echo "Неприпустимий тип файлу. Будь ласка, завантажте файл у форматі JPEG, PNG або GIF.";
//}
if(!empty($_FILES['imgProfile']['name'])&& $_FILES['imgProfile']['error'] !== 4) {
    foreach($files as $file) {
        if(is_file($file));
        unlink($file);
    }
    $imgProfile = savingProfileIMGtoDatabase($_FILES['imgProfile'], $id);
}
else{
    $imgProfile = $imgAvatardb;
}

$usersurname = stripslashes(htmlspecialchars(trim($_POST['usersurname'])));
$username = stripslashes(htmlspecialchars(trim($_POST['username'])));

$_SESSION['avatar'] = $imgProfile;
$_SESSION['usersurname'] = $usersurname;
$_SESSION['username'] = $username;
$_SESSION['user'] = $usersurname.' '.$username;
//var_dump($_SESSION);
$query = "UPDATE `users` SET `avatar`= '$imgProfile',`usersurname`='$usersurname',`username`='$username' WHERE `id` = ".$id;

if (mysqli_query($conn, $query)) {
    header('Location: ../userProfile.php');
    mysqli_close($conn);
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}

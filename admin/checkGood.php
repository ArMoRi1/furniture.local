<?php
include('../include/config.php');
include('../include/function.php');


$name = mysqli_real_escape_string($conn, $_POST['name']);
$size = mysqli_real_escape_string($conn, $_POST['size']);
$karkass = mysqli_real_escape_string($conn, $_POST['karkass']);
$filling = mysqli_real_escape_string($conn, $_POST['filling']);
$bedsquare = mysqli_real_escape_string($conn, $_POST['bedsquare']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$content = mysqli_real_escape_string($conn, $_POST['content']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$numberOfGood = mysqli_real_escape_string($conn, $_POST['numberOfGood']);
if($_FILES['img1']) {
    $img1 = savingIMGtoDatabase($_FILES['img1'], $category, $name, 1);
}
if($_FILES['img2']){
    $img2 = savingIMGtoDatabase($_FILES['img2'], $category, $name, 2);
}
if($_FILES['img3']){
    $img3 = savingIMGtoDatabase($_FILES['img3'], $category, $name, 3);
}
if($_FILES['video']){
    $video = savingIMGtoDatabase($_FILES['video'], $category, $name, 4);
}

$query = "INSERT INTO `furniture` (`id`, `name`, `img1`, `img2`, `img3`, `video`, `size`, `karkass`, `filling`, `bedsquare`, `category`, `content`, `price`, `numberOfGood`) VALUES
                                  (NULL, '$name', '$img1', '$img2','$img3', '$video', '$size', '$karkass', '$filling', '$bedsquare', '$category', '$content','$price', '$numberOfGood')";
if (mysqli_query($conn, $query)) {
   header('Location: index.php');
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>

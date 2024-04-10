<?php

include('../include/config.php');
include('../include/function.php');
$id = $_POST['id'];

$name = mysqli_real_escape_string($conn, $_POST['name']);
$size = mysqli_real_escape_string($conn, $_POST['size']);
$karkass = mysqli_real_escape_string($conn, $_POST['karkass']);
$filling = mysqli_real_escape_string($conn, $_POST['filling']);
$bedsquare = mysqli_real_escape_string($conn, $_POST['bedsquare']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$content = mysqli_real_escape_string($conn, $_POST['content']);
$price = mysqli_real_escape_string($conn, $_POST['price']);

$img1db = getIMGFromDatabase('img1',$id);
$img2db = getIMGFromDatabase('img2',$id);
$img3db = getIMGFromDatabase('img3',$id);
$videodb = getIMGFromDatabase('video',$id);

if (isset($_FILES['img1']) && $_FILES['img1']['error'] !== 4) {
    $img1 = savingIMGtoDatabase($_FILES['img1'], $category, $name, 1);
} else {
    $img1 = $img1db;
}

if (isset($_FILES['img2']) && $_FILES['img2']['error'] !== 4) {
    $img2 = savingIMGtoDatabase($_FILES['img2'], $category, $name,2);
} else {
    $img2 = $img2db;
}

if (isset($_FILES['img3']) && $_FILES['img3']['error'] !== 4) {
    $img3 = savingIMGtoDatabase($_FILES['img3'], $category, $name,3);
} else {
    $img3 = $img3db;
}

if (isset($_FILES['video']) && $_FILES['video']['error'] !== 4) {
    $video = savingIMGtoDatabase($_FILES['video'], $category, $name,4);
} else {
    $video = $videodb;
}

$query = "UPDATE `furniture` SET
            `name` = '$name',
            `img1` = '$img1',
            `img2` = '$img2',
            `img3` = '$img3',
            `video` = '$video',
            `size` = '$size',
            `karkass` = '$karkass',
            `filling` = '$filling',
            `bedsquare` = '$bedsquare',
            `category` = '$category',
            `content` = '$content',
            `price` = '$price'
          WHERE `furniture`.`id` =".$id;

if (mysqli_query($conn, $query)) {
    header('Location: index.php');
    mysqli_close($conn);
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>

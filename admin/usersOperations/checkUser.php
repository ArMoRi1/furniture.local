<?php
include('../../include/config.php');
include('../../include/function.php');


$name = mysqli_real_escape_string($conn, $_POST['name']);

$query = "INSERT INTO `furniture` (`id`, `name`, 
                         (NULL, '$name', )";
if (mysqli_query($conn, $query)) {
   header('Location: index.php');
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>

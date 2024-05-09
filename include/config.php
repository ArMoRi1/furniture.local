<?php
$servername = 'localhost';
$username = 'root';
$pass = '';
$dbname = 'furnituredb';


$conn = mysqli_connect($servername, $username, $pass, $dbname);

if (mysqli_connect_errno()){
    die('Can not connect to database: ('
        .mysqli_connect_errno().'): '
        .mysqli_connect_error());

}

<?php
function tt($var){
    if (is_array($var)) {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    } else {
        echo $var;
    }
}
function get_furniture() {
    global $conn;
    $sql = "SELECT * FROM furniture";
    $result = mysqli_query($conn, $sql);
    $furniture = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $furniture;
}
function get_rolees(){
    global $conn;
    $sql = 'SELECT * FROM rolee';
    $result = mysqli_query($conn, $sql);
    $rolees = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $rolees;
}
function get_furniture_for_plagins($table, $limit, $offset){
    global $conn;
    $sql = "SELECT * FROM $table LIMIT $limit OFFSET $offset";
    $result = mysqli_query($conn, $sql);
    $furniture = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $furniture;
}
function get_furniture_by_id ($furniture_id) {
    global $conn;
    $sql = "SELECT * FROM furniture WHERE id =" .$furniture_id;
    $result = mysqli_query($conn, $sql);
    $furniture = mysqli_fetch_assoc($result);
    return $furniture;
}
function get_furniture_by_category($category_id)
{
    global $conn;
    $sql  = "SELECT * FROM furniture WHERE category = " .$category_id;
    $result = mysqli_query($conn, $sql);
    $furniture = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $furniture;
}
function countRowsByCategory($category){
    global $conn;
    $sql = "SELECT COUNT(category) FROM furniture WHERE category =".$category;
    $result = mysqli_query($conn, $sql);
    $furniture = mysqli_fetch_column($result);

    return $furniture;
//
}
function countRows(){
    global $conn;
    $sql = "SELECT COUNT(*) FROM furniture ";
    $result = mysqli_query($conn, $sql);
    $furniture = mysqli_fetch_column($result);
    return $furniture;
//
}
function FindByWords(){
     global $conn;
    $keywords = trim(strip_tags(stripcslashes(htmlspecialchars($_POST['submitKeywords']))));

    if(isset($keywords)){
        $search = explode(" ", $keywords);
        $count = count($search);
        $array = array();
        $i=0;
        foreach($search as $key) {
            $i++;
            if($i < $count){
                $array[] = "CONCAT ('name', 'content') LIKE '%".$key."%'OR ";
            }
            else{
                $array[] = "CONCAT ('name', 'content') LIKE '%".$key."%'";
            }
        }
        $sql = "SELECT * FROM `furniture` WHERE ".implode("",$array);
        echo $sql;
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);
        return $row;
    }
}

function GetIDUsingEmail($email) {
    global $conn;

    // Використовуйте параметризований запит для уникнення SQL-ін'єкцій
    $sql = "SELECT id FROM users WHERE email = ?";

    $stmt = mysqli_prepare($conn, $sql);

    // Передайте значення параметра і зв'яжіть його з запитом
    mysqli_stmt_bind_param($stmt, "s", $email);

    // Виконайте запит
    mysqli_stmt_execute($stmt);

    // Отримайте результат
    mysqli_stmt_bind_result($stmt, $id);
    mysqli_stmt_fetch($stmt);

    // Закрийте підготовлений запит
    mysqli_stmt_close($stmt);

    return $id;
}


function GetRoleUsingEmail($email) {
    global $conn;

    // Використовуємо підготовлений запит для уникнення SQL-ін'єкцій
    $sql = "SELECT rolee FROM users WHERE email = ?";

    // Підготовка запиту
    $stmt = mysqli_prepare($conn, $sql);

    // Перевірка на помилку підготовленого запиту
    if ($stmt) {
        // Прив'язка параметру та встановлення значення
        mysqli_stmt_bind_param($stmt, "s", $email);

        // Виконання запиту
        mysqli_stmt_execute($stmt);

        // Збереження результату
        $result = mysqli_stmt_get_result($stmt);

        // Отримання асоціативного масиву
        $row = mysqli_fetch_assoc($result);

        // Закриття підготовленого запиту
        mysqli_stmt_close($stmt);

        // Перевірка, чи рядок існує та має ключ 'rolee'
        if ($row && isset($row['rolee'])) {
            return $row['rolee']; // Повертаємо значення ролі
        } else {
            // Якщо немає результатів чи відсутнє поле 'rolee'
            return false;
        }
    } else {
        // Обробка помилки підготовленого запиту
        return false;
    }
}
//function savingIMGtoDatabase($img,$category, $name){
//    $imgpath = '../img/database/slider';
//    if($category==1){
//        $imgpath = $imgpath.'/Кутові дивани/';
//    } elseif($category==2){
//        $imgpath = $imgpath.'/Прямі дивани/';
//    }elseif($category==3){
//        $imgpath = $imgpath.'/Ліжка/';
//    }
//    $imgpath = $imgpath.$name.'/';
//
//    if(!is_dir($imgpath)){
//        mkdir($imgpath, 0777, true);
//    }
//
//    $fileName = $img['name'];
//
//    if (!empty($fileName)) {
//        $imgP = $imgpath . $fileName;
//
//        move_uploaded_file($img['tmp_name'], $imgP);
//        $imgP = substr_replace($imgP, null, 0, 3);
//
//        return $imgP;
//    } else {
//        // Ви можете обробити помилку, якщо ім'я файлу порожнє
//        return false;
//    }
function savingIMGtoDatabase($img, $category, $name, $index){

    if (!empty($img) && $img['error'] == UPLOAD_ERR_OK) {
        $imgpath = '../img/database/slider';
        if($category == 1){
            $imgpath .= '/Кутові дивани/';
        } elseif($category == 2){
            $imgpath .= '/Прямі дивани/';
        } elseif($category == 3){
            $imgpath .= '/Ліжка/';
        }
        $imgpath .= $name.'/';

        if(!is_dir($imgpath)){
            mkdir($imgpath, 0777, true);
        }
        $file_name = $_FILES['file']['name'];
        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $fileName = $index . $file_extension;

        $imgP = $imgpath . $fileName;

        if (move_uploaded_file($img['tmp_name'], $imgP)) {
            $imgP = substr_replace($imgP, null, 0, 3);
            return $imgP;
        } else {
            // Обробити помилку переміщення файлу, якщо потрібно
            return false;
        }
    } else {
        // Ви можете обробити помилку, якщо ім'я файлу порожнє
        return false;
    }
}
function savingProfileIMGtoDatabase($img, $id){

    if (!empty($img) && $img['error'] == UPLOAD_ERR_OK){
        $imgpath = '../img/database/usersAvatars';
        $imgpath .= '/'.$id.'/';

        if(!is_dir($imgpath)){
            mkdir($imgpath, 0777, true);
        }
        $file_name = $img['name'];
        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $fileName = $id .'.'. $file_extension;
        $imgP = $imgpath . $fileName;
        if (move_uploaded_file($img['tmp_name'], $imgP)) {
            $imgP = substr_replace($imgP, null, 0, 3);
            return $imgP;
        } else {
            // Обробити помилку переміщення файлу, якщо потрібно
            return false;
        }
    }else {
        // Ви можете обробити помилку, якщо ім'я файлу порожнє
        return false;
    }
}

function getIMGFromDatabase($filename, $id){
    global $conn;
    $sql = "SELECT ".$filename." FROM furniture WHERE id=".$id;
    $result = mysqli_query($conn, $sql);

    // Перевірка чи є результат та чи є хоча б один рядок
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row[$filename];
    } else {
        return false; // Якщо немає результатів або помилка
    }
}
function getIMGAvatarFromDatabase($filename, $id){
    global $conn;
    $sql = "SELECT ".$filename." FROM users WHERE id=".$id;
    $result = mysqli_query($conn, $sql);

    // Перевірка чи є результат та чи є хоча б один рядок
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row[$filename];
    } else {
        return false; // Якщо немає результатів або помилка
    }
}
function getOrderById($orderId): array
{
    global $conn;
    $sql = 'SELECT * FROM `orders` WHERE `id`='.$orderId;
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
function getStatusName($status)
{
    global $conn;
    $sql = 'SELECT * FROM `orderstatus` WHERE `id`='.$status;
    $row = mysqli_query($conn, $sql);
    $result = mysqli_fetch_all($row, MYSQLI_ASSOC);
    return $result[0]['status'];
}

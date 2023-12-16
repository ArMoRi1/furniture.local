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
    $sql = $sql = "SELECT * FROM furniture WHERE category = " .$category_id;
    $result = mysqli_query($conn, $sql);
    $furniture = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $furniture;
}
function countRowsByCategory($category){
    global $conn;
    $sql = "SELECT COUNT(category) FROM furniture WHERE category =".$category;
    $result = mysqli_query($conn, $sql);
    $furniture = mysqli_fetch_column($result);
    tt($furniture);
    return $furniture;
//
}
function countRows(){
    global $conn;
    $sql = "SELECT COUNT(*) FROM furniture ";
    $result = mysqli_query($conn, $sql);
    $furniture = mysqli_fetch_column($result);
    tt($furniture);
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
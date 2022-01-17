
<?php
session_start();
require_once("../db.php");

// print_r($_POST);

$fun_num = $_POST['fun_num'];
$fun_item_head = $_POST['fun_item_head'];


$flag = true;

if (!$fun_num) {
    $_SESSION['fun_num'] = "fun number required";
    $flag = false;
}
if (!$fun_item_head) {
    $_SESSION['fun_item_head'] = "fun item head required";
    $flag = false;
}
if ($flag) {
    $_SESSION['fun_num'] = $fun_num;
    //insert query;
    $insert_query = "INSERT INTO funfact_items(fun_num,fun_item_head) VALUES('$fun_num','$fun_item_head')";
    mysqli_query($db_connect, $insert_query);

    header('location: funfact_item.php');
} else {
    header('location: funfact_item.php');
}


?>
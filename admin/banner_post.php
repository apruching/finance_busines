
<?php
session_start();
require_once '../db.php';

// print_r($_FILES['banner_image']);
$banner_sub_title = $_POST['banner_sub_title'];
$banner_title = $_POST['banner_title'];
$banner_detail = $_POST['banner_detail'];

$uploaded_image_original_name = $_FILES['banner_image']['name'];
$uploaded_image_original_size = $_FILES['banner_image']['size'];

if ($uploaded_image_original_size <= 2000000) {
    $after_explode = explode('.', $uploaded_image_original_name);
    $image_extension = end($after_explode);
    $allow_extension = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'JNG');
    if (in_array($image_extension, $allow_extension)) {
        $insert_query = "INSERT INTO bannners (banner_sub_title,banner_title,banner_detail,image_location) VALUES ('$banner_sub_title','$banner_title','$banner_detail','primary_location')";

        mysqli_query($db_connect, $insert_query);

        $id_from_db = mysqli_insert_id($db_connect);

        $image_new_name = $id_from_db . "." . $image_extension;

        $save_location = "../uploads/banner/" . $image_new_name;
        move_uploaded_file($_FILES['banner_image']['tmp_name'], $save_location);

        $image_location = "uploads/banner/" . $image_new_name;

        $update_query = "UPDATE bannners SET image_location='$image_location' WHERE id=$id_from_db";

        mysqli_query($db_connect, $update_query);

        header('location: banner.php');
    } else {
        echo "pai nai";
    }
} else {
    echo "file is too big more than 2mb";
}
?>
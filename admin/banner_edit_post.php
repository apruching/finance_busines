
<?php
session_start();
require_once '../db.php';
// print_r($_FILES);

$id = $_POST['id'];
$banner_sub_title = $_POST['banner_sub_title'];
$banner_title = $_POST['banner_title'];
$banner_detail = $_POST['banner_detail'];

$update_query = "UPDATE bannners SET banner_sub_title='$banner_sub_title',banner_title='$banner_title',banner_detail='$banner_detail' WHERE id=$id ";

mysqli_query($db_connect, $update_query);

if ($_FILES['banner_image']['name']) {
    $uploaded_image_original_name = $_FILES['banner_image']['name'];
    $uploaded_image_original_size = $_FILES['banner_image']['size'];
    if ($uploaded_image_original_size <= 2000000) {
        $after_explode = explode('.', $uploaded_image_original_name);
        $image_extension = end($after_explode);
        $allow_extension = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'JNG');
        if (in_array($image_extension, $allow_extension)) {

            $get_image_location_query = "SELECT image_location FROM bannners WHERE id=$id";

            $image_location_from_db = mysqli_query($db_connect, $get_image_location_query);

            $after_assoc_image_location = mysqli_fetch_assoc($image_location_from_db);

            $after_assoc_image_location['image_location'];

            unlink("../" . $after_assoc_image_location['image_location']);

            $image_new_name = $id . "." . $image_extension;

            $save_location = "../uploads/banner/" . $image_new_name;
            move_uploaded_file($_FILES['banner_image']['tmp_name'], $save_location);

            $image_location = "uploads/banner/" . $image_new_name;

            $update_image_query = "UPDATE bannners SET image_location='$image_location' WHERE id=$id";

            mysqli_query($db_connect, $update_image_query);

            header('location: banner.php');
        } else {
            echo "pai nai";
        }
    } else {
        echo "file is too big more than 2mb";
    }
}
header('location: banner.php');

?>
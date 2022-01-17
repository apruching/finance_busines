
<?php
session_start();
require_once('../db.php');
$login_email = $_SESSION['email'];
// print_r($_POST);


if ($_POST['user_name'] == NUll || $_POST['phone'] == NULL) {
    $_SESSION['profile_err'] = "All field required!";
    header('location: profile_edit.php');
} else {
    $user_name = $_POST['user_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $update_query = "UPDATE users SET user_name='$user_name',phone='$phone' WHERE email='$login_email'";

    mysqli_query($db_connect, $update_query);
    header('location: profile.php');
}
?>
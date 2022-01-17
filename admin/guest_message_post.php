
<?php
session_start();
require_once '../db.php';
// print_r($_POST);

$guest_name = $_POST['guest_name'];
$guest_email = $_POST['guest_email'];
$guest_message = $_POST['guest_message'];

// insert query;
$insert_query = "INSERT INTO guest_mess (guest_name,guest_email,guest_message) VALUES('$guest_name','$guest_email','$guest_message')";

//insert data into database
mysqli_query($db_connect, $insert_query);

header('location: ../index.php');
?>

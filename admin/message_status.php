
<?php
require_once '../db.php';
// print_r($_GET);
$id = $_GET['message_id'];

$update_query = "UPDATE guest_mess SET read_status=2 WHERE id=$id";
mysqli_query($db_connect, $update_query);
header('location: guest_message.php');
?>
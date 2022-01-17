
<?php
require_once '../db.php';

$id = $_GET['banner_id'];

$update_query = "UPDATE bannners SET active_status=2 WHERE id=$id";
mysqli_query($db_connect, $update_query);
header('location: banner.php');
?>
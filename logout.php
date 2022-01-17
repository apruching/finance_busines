<?php
require_once("header.php");
?>
<?php
session_start();
unset($_SESSION['user_status']);
header('location: login.php');
?>

<?php
require_once("footer.php");
?>
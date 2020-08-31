<?php
include("../inc/functions.php");
$t=$_GET['id'];
delete_user($t);
header("location:manageUser.php");
?>

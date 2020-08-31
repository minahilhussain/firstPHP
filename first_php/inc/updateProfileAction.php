<?php
session_start();
include('connection.php');
$n=$_REQUEST['name'];
$e=$_REQUEST['email'];
$p=$_REQUEST['password1'];
$p2=$_REQUEST['password2'];
$id=$_SESSION['id'];
$sq = "SELECT * FROM Users where email='$e'";
$db =new db();
$result=$db->query($sq);
if ($result->num_rows >1) {
  header('location:updateProfile.php?failed=EmailAlreadyTaken');
}
else if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
 header('location:updateProfile.php?failed=invalidEmailAddress');
}
else if($p!= $p2 && !is_null($p) && !is_null($p2)) {
  header('location:updateProfile.php?failed=passwordMissMatch');
}
else if(!preg_match("/^[a-zA-Z ]*$/",$n)) {
  header('location:updateProfile.php?failed=InvalidName');
} else {
  $p = password_hash($p, PASSWORD_DEFAULT);
  $sql="update Users set name='$n', email='$e', password='$p' where id='$id'";
  $db->query($sql);
  $_SESSION['uName']=$_REQUEST['name'];
  $path="location:../".$_SESSION['type']."/".$_SESSION['type'].".php";
  if($_SESSION['type']=='other') {
    $path="location:../index.php";
  }
  header($path);
}
?> 

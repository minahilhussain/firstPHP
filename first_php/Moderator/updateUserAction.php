<?php
include('../inc/connection.php');
$n=$_REQUEST['name'];
$e=$_REQUEST['email'];
$p=$_REQUEST['password1'];
$p2=$_REQUEST['password2'];
$id=$_REQUEST['id'];
$t=$_REQUEST["type"];
$s=$_REQUEST["status"];
echo $e." ".$n." ".$id." ".$t." ".$s;
$sq = "SELECT * FROM Users where email='$e'";
$db =new db();
$result=$db->query($sq);
if ($result->num_rows >1) 
{
  header("location:updateUser.php?id=".$id."&failed=EmailAlreadyTaken");
}
else if (!filter_var($e, FILTER_VALIDATE_EMAIL)) 
{
 header("location:updateUser.php?id=".$id."&failed=invalidEmailAddress");
}
else if($p!= $p2 && !is_null($p) && !is_null($p2))
{
  header("location:updateUser.php?id=".$id."&failed=passwordMissMatch");
}
else if(!preg_match("/^[a-zA-Z ]*$/",$n)) 
{
  header("location:updateUser.php?id=".$id."&failed=InvalidName");
}
else
{
  $p = password_hash($p, PASSWORD_DEFAULT);
  $sql="update Users set name='$n', email='$e', password='$p', status='$s' where id='$id'";
  $db->query($sql);
  header("location:../Moderator/manageUser.php?uName=admin");
}
?>

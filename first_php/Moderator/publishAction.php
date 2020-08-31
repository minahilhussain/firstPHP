<?php
session_start();
include('../inc/connection.php');
$id=$_GET["id"];
$p=$_GET["p"];
echo $id." ".$p;
$db=new db();
$p=($p+1)%2;
$sql = "UPDATE books SET published='$p' WHERE id='$id' ";
$db->query($sql);
if($_SESSION["type"]=="admin")
{
  header("location:../Author/manageBook.php"); 
}
else
{
  header("location:publish.php");
}
?>

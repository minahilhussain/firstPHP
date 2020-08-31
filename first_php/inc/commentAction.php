<?php
session_start();
include('connection.php');
$db=new db();
$d=addslashes($_POST['des']);
$id=$_POST['id'];
$name=$_SESSION['uName'];
if($name==NULL){
	header("location:../login.php");
} else {
  $sql =  "insert into Comments (name,comment,book_id) values ('$name','$d','$id')";
  $db->query($sql);
  header("location:description.php?id=$id");
}
?>

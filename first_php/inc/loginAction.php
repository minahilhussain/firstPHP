<?php
session_start();
include('connection.php');
$sql = "SELECT Users.id, Users.email, Users.status, Users.name,Users.password, Users_type.type FROM Users JOIN Users_type ON Users_type.t_id=Users.t_id";
$success=0;
$db =new db();
$res=$db->query($sql);
while($row=$res->fetch_assoc())
{  
  if( $_REQUEST['email']==$row['email']){  $success=1;
   if($row['status']=='0'){
     header('location:../login.php?loginfailed=LoginUnavailable');
   }
   else if(password_verify ( $_REQUEST["password"] , $row["password"])){
    $_SESSION['uName']=$row['name'];
    $_SESSION['type']=$row['type'];
    $_SESSION['id']=$row['id'];
    echo "<script>window.history.go(-2)</script>";

  } else { 
   header('location:../login.php?loginfailed=WrongPassword');
 }
}
}    
if($success==0) { 
  header('location:../login.php?loginfailed=UserNotFound');
}
?>

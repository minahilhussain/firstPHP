<?php
session_start();
$pageTitle='Update Profile';
include("functions.php");
include ("connection.php");
$n=$_SESSION['uName'];
$t=$_SESSION['type'];
$id=$_SESSION['id'];
$db=new db();
$sql = "SELECT * FROM Users where id='$id'";
$res_data=$db->query($sql);
while($row = mysqli_fetch_array($res_data)){
  $name=$row["name"];
  $email=$row["email"];
}
?>
<html>
<head>
  <?php include('../inc/head.php');?>
</head>
<body>
  <div class="header">
    <div class="wrapper">
     <ul class="nav">
      <li><a href="../index.php">HOME</a></li>
    </ul>
  </div>
</div>
<section class="my-5">
  <div class="py -5">
   <h2 class="text-center">Update Information</h2>
 </div>
 <div class="w-50 m-auto">
  <?php
  if (isset($_REQUEST['failed']))
  {
    if(  $_REQUEST['failed']=="invalidEmailAddress")
    {
     echo "<div class='w-50 container alert alert-danger'>";
     echo" <strong>Invalid Email adress!</strong> Try different email</div>";
   }
   else if(  $_REQUEST['failed']=="EmailAlreadyTaken")
   {
    echo "<div class='w-50 container alert alert-danger'>";
    echo" <strong>Email already taken!</strong></div>";
  }
  else if(  $_REQUEST['failed']=="passwordMissMatch")
  {
    echo "<div class='w-50 container alert alert-danger'>";
    echo" <strong>Password mismatch!</strong> Retypr password</div>";
  }
  else if(  $_REQUEST['failed']=="InvalidName")
  {
    echo "<div class='w-50 container alert alert-danger'>";
    echo" <strong>Invalid Name!</strong> Try different name</div>";
  }
}
?>
<form action="updateProfileAction.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
   <label>User Name</label>
   <input type="text" name="name" value="<?php echo $name;?>" required class="form-control">
   <label>Email</label>
   <input type="text" name="email" value="<?php echo $email;?>" required class="form-control">
   <label>New Password</label>
   <input type="password" name="password1" class="form-control">
   <label>Confirm Password</label>
   <input type="password" name="password2" class="form-control">
   <input type="hidden" name="id" value="<?php echo $id;?>">
   <br>
   <button type="submit" class="btn btn-success">Update</button><br><br>
   <div class="form-group">
   </div>
 </form>
</div>
<div class="spacing"></div>
</section>
<?php include('../inc/footer.php');?>
</body>
</html>

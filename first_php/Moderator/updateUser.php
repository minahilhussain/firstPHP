<?php
include ('../inc/connection.php');
include("../inc/functions.php");
$pageTitle='Update User';
$id=$_GET['id'];
$db=new db();
$sql = "SELECT * FROM Users INNER JOIN Users_type ON Users_type.t_id=Users.t_id where Users.id='$id'";
$res_data =$db->query($sql);
while($row = mysqli_fetch_array($res_data)) {
  $name=$row["name"];
  $email=$row["email"];
  $type=$row["type"];
  $status=$row["status"];
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
     <h2 class="text-center">Update User</h2>
   </div>
   <div class="w-50 m-auto">
    <form action="updateUserAction.php" method="post" enctype="multipart/form-data">
     <?php
     if (isset($_REQUEST['failed'])) {
      if(  $_REQUEST['failed']=="invalidEmailAddress"){
        echo "<div class='w-50 container alert alert-danger'>";
        echo" <strong>Invalid Email address!</strong></div>";
      }
      else if(  $_REQUEST['failed']=="EmailAlreadyTaken") {
        echo "<div class='w-50 container alert alert-danger'>";
        echo" <strong>Email already taken!</strong></div>";
      }
      else if(  $_REQUEST['failed']=="passwordMissMatch"){
        echo "<div class='w-50 container alert alert-danger'>";
        echo" <strong>Password mismatch!</strong></div>";
      }
      else if(  $_REQUEST['failed']=="InvalidName"){
        echo "<div class='w-50 container alert alert-danger'>";
        echo" <strong>Invalid Name!</strong> Try different name</div>";
      }
    } 
    ?>
    <div class="form-group">
     <label>User Name</label>
     <input type="text" name="name" value="<?php echo $name;?>" required class="form-control">
     <label>Email</label>
     <input type="text" name="email" value="<?php echo $email;?>" required class="form-control">
     <label>Type</label>
     <input type="text" name="type" value="<?php echo $type;?>" required class="form-control">
     <label>Status</label>
     <input type="text" name="status" value="<?php echo $status;?>" required class="form-control">
     <label>New Password</label>
     <input type="password" name="password1" class="form-control">
     <label>Confirm Password</label>
     <input type="password" name="password2" class="form-control">
     <input type="hidden" name="id" value="<?php echo $id;?>">
     <br>
     <button type="submit" class="btn btn-success">Update</button>
     <div class="form-group">
     </div>
   </form>
 </div>
</section>
<?php include('footer.php');?>
</body>
</html>

<?php 
session_start();
$pageTitle="Moderator";
?>
<html>
<head>
 <?php include('../inc/head.php');?>
</head>
<body>
  <div class="header">
    <div class="wrapper">
      <ul class="nav" class="header_justify">
        <li><a href="../Author/manageBook.php?uName=<?php echo  $_SESSION['uName'];?>">Manage Books</a></li>
        <li><a href="../Moderator/manageUser.php?uName=<?php echo  $_SESSION['uName'];?>">Manage Users</a></li>
        <li><a href=<?php echo "../index.php"."?uName=".$user."&type=".$type; ?> >HOME</a></li>
        <li><a href="#">HELLO <?php echo  $_SESSION['uName'];?></a></li>
        <li><a href="../inc/logout.php">LOGOUT</a></li>
      </ul>
    </div>
  </div>
  <div id="content">
    <div class="section catalog random">
      <div class="wrapper">
        <h2>Go To?</h2>
        <ol class="items">
          <li><a href="../inc/updateProfile.php">Update Profile</a></li>
        </ol>
      </div>
    </div>
  </div>
  <?php include('inc/footer.php');?>
</body>
</html>


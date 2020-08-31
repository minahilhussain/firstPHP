<?php
session_start();
$pageTitle='Manage User';
include("../inc/functions.php");
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
     <h2 class="text-center">Manage User</h2>
     <ol class="items">
      <?php
        get_users();
      ?>
    </ol>
  </div>
  <script async src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script async src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script async src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>

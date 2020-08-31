<?php
session_start();
include("functions.php");
$pageTitle='Search Book';
$user=$_SESSION['uName'];
$type=$_SESSION['type'];
$title=$_POST["search"];
?>
<html>
<head>
	<?php include('../inc/head.php');?>
</head>
<body>
  <div class="header">
    <div class="wrapper">
      <ul class="nav">
        <li>   
          <form class="example" method="post" action="../inc/bookSearch.php">
            <input type="text" required placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form></li>
          <li><a href="../index.php">HOME</a></li>
          <?php if(isset($_SESSION['uName'])){
            $path="../".$type."/".$type.".php";
            echo "<li><a href='logout.php'>LOGOUT</a></li>";
            echo "<li><a href=".$path.">HELLO  ". $user."</a></li>";
          } else{
            echo "<li><a href='../login.php'>LOGIN</a></li>";
          }
        ?>
      </ul>
    </div>
  </div>
  <div id="content">
    <div class="section catalog random">
      <div class="wrapper">
        <h2>Books</h2>
        <ol class="items">
         <?php search_book($title);?>
       </ol>
     </div>
   </div>
 </div>
 <?php include('footer.php');?>

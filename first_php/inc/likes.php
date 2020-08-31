<?php
session_start();
include ('connection.php');
$u_id= $_SESSION['id'];
$bid=$_GET['bid'];
if (is_null($_SESSION['uName'])) {
    header("location:../login.php");
} else {
    $db=new db();
    if (isset($_REQUEST['like'])) {
    $sql="INSERT INTO Rating (book_id,u_id, likes, dislikes) VALUES ('$bid','$u_id','1','0')";
    } else {
     $sql="INSERT INTO Rating (book_id,u_id, likes, dislikes) VALUES ('$bid','$u_id','0','1')";
    }
    $db->query($sql);
    $sq1=" select sum(likes) from Rating where book_id='$bid'";
    $result=$db->query($sq1);
    $row = mysqli_fetch_assoc($result); 
    $sum = $row['sum(likes)'];
    $sq1=" select sum(dislikes) from Rating where book_id='$bid'";
    $result=$db->query($sq1);
    $row = mysqli_fetch_assoc($result); 
    $sum2 = $row['sum(dislikes)'];
    $rating=($sum/($sum+$sum2))*5; 
    $rating=number_format((float)$rating, 2, '.', '');
    $sq = "UPDATE books SET rating='$rating' WHERE id='$bid' ";
    $result=$db->query($sq);
    $row = mysqli_fetch_assoc($result); 
    $sum = $row['rating'];
    echo "<script>window.history.go(-1)</script>";
}
?>

<?php
include 'connect.php';
$id=$_GET['deleteid'];
// echo $id;
$sql="delete FROM seriescrud where id=$id";
$result=mysqli_query($con,$sql);
if($result){
   // echo " Data Deleted Succesfully";
   header('location:read.php');
}else{
    die(mysqli_error($con));
}

?>

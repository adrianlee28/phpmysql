<?php

include 'connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Search Data</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
$data=$_GET['data'];
// echo $data;
$sql="Select * FROM seriescrud where id=$data";
$result=mysqli_query($con,$sql);
if($result){
    $row=mysqli_fetch_assoc($result);
    echo '<div class="container">
    <div class="jumbotron">
  <h1 class="display-4 text-center text-success">'.$row['fname'].'</h1>
  <p class="lead text-center text-danger">Your email id is : '.$row['email'].'</p>
  <hr class="my-4">
  
    <a class="btn btn-dark btn-lg" href="search.php" role="button">Back</a>
  </p>
</div>
    </div>';

}


    ?>

    

</body>
</html>  

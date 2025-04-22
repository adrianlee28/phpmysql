<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
    <table class="table">
  <thead class="bg-dark text-light">
    <tr>
      <th scope="col">Sl No</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Mobile</th>
    </tr>
  </thead>

  <tbody>
    <?php

$sql="Select * from seriescrud";
$result=mysqli_query($con,$sql);
$num=mysqli_num_rows($result);
$numberPages=5;
$totalPages=ceil($num/$numberPages);
//echo $totalPages;
// creating pagination buttons
for($btn=1;$btn<=$totalPages;$btn++){
echo '<button class="btn btn-dark mx-1 mb-3"><a href="pagination.php?page='.$btn.'" class="text-light">'.$btn.'</a></button>';
}
if(isset($_GET['page'])){
    $page=$_GET['page'];
   // echo $page;
}else{
    $page=1;
}
//1-----> 0,5
//2------>5,5
//3------>10,5
//(pnum-1)*$numberPages

$startinglimit=($page-1)*$numberPages;
$sql="Select * from seriescrud limit " .$startinglimit.','.$numberPages;
$result=mysqli_query($con,$sql);

//echo $num;
while ($row=mysqli_fetch_assoc($result)){
    echo '<tr>
      <th scope="row">'.$row['id'].'</th>
      <td>'.$row['fname'].'</td>
      <td>'.$row['lname'].'</td>
      <td>'.$row['mobile'].'</td>
    </tr>';
}
?>
    
    
    
  </tbody>
</table>
    </div>
</body>
</html>

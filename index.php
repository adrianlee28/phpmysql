<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $gender=$_POST['gender'];
    $datas = $_POST['data'];
    $allData = implode(",", $datas);;
    $place=$_POST['place'];

    // insert query
    $sql=" insert into seriescrud (fname,lname,email,mobile,multipleData,gender, place) 
    values ('$fname','$lname','$email','$mobile','$allData', '$gender', '$place')";

    $result=mysqli_query($con,$sql);
    if($result){
        header('location:read.php');
    }else{
    die(mysqli_error($con));
    }

}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>PHP crud series</title>
</head>

<body>
   
<div class="container my-5">
        <form method="post">
        <div class="mb-3">
            <label class="form-label">First name</label>
            <input type="text" class="form-control" 
            placeholder="Enter your First Name" name="fname" autocomplete="off">
        </div>
        <div class="mb-3">
            <label class="form-label">Last name</label>
            <input type="text" class="form-control" 
            placeholder="Enter your Last Name" name="lname" autocomplete="off">
        </div>
        <div class="mb-3">
            <label class="form-label"> Email</label>
            <input type="text" class="form-control" 
            placeholder="Enter your Email" name="email" autocomplete="off">
        </div>
        <div class="mb-3">
            <label class="form-label">Mobile</label>
            <input type="text" class="form-control" 
            placeholder="Enter your Mobile" name="mobile" autocomplete="off">
        </div>
        <div>
        <input type="checkbox" name="data[]" value="JavaScript">JavaScript
        <input type="checkbox" name="data[]" value="React">React
        <input type="checkbox" name="data[]" value="HTML">HTML
        <input type="checkbox" name="data[]" value="CSS">CSS
        </div>
        <div class="my-3">
            Gender:
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="kids">Kids
        </div>
        
        <div>  
    <select name="place" class="my-5">
        <option value="Maplegrove">Maplegrove</option>
        <option value="Anyana">Anyana</option>
        <option value="Tagaytay">Tagaytay</option>
        <option value="Mendez">Mendez</option>
    </select> 
    </div>
    <div class="my-5">
        <button class="btn btn-dark btn-lg my-5" name="submit">Submit </button>
    </div>

        </form>

    
</body>

</html>

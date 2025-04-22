<?php
include 'connect.php';
if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];

$sql="Select * FROM seriescrud where id=$id";
$result=mysqli_query($con,$sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $fname = $row['fname'];
    $lname = $row['lname'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $datas = $row['multipleData'];
    $gender = $row['gender'];
    $place = $row['place'];
} else {
    die("User not found or query failed: " . mysqli_error($con));
}
} else {
echo "No update ID provided in URL.";
exit;
}

if(isset($_POST['update'])){
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$datas = $_POST['data'];
$gender = $_POST['gender'];
$place = $_POST['place'];
$allData = implode(",", $datas);

$sql = "UPDATE seriescrud 
SET fname='$fname', lname='$lname', email='$email', mobile='$mobile', multipleData='$allData', gender='$gender', place='$place'
WHERE id=$id";

$result = mysqli_query($con, $sql);

if($result){
    //echo "updated succesfully";
    header('location:read.php');
}else{
    die(mysqli_error($con));
}
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Update data</title>
</head>

<body>
    <div class="container my-5">
        <form method="post" action="">
            
                <div class="form-group mb-3">
                    <label>First Name</label>
                    <input type="text" class="form-control" autocomplete="off" name="fname" value="<?php echo $fname; ?>">
                </div>
                <div class="form-group mb-3">
                    <label>Last Name</label>
                    <input type="text" class="form-control" autocomplete="off" name="lname" value="<?php echo $lname; ?>">
                </div>
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" autocomplete="off" name="email" value="<?php echo $email; ?>">
                </div>
                <div class="form-group mb-3">
                    <label>Mobile</label>
                    <input type="text" class="form-control" autocomplete="off" name="mobile" value="<?php echo $mobile; ?>">
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
                <select name="place">  
                    <option value="Maplegrove">Maplegrove</option>
                    <option value="Anyana">Anyana</option>
                    <option value="Tagaytay">Tagaytay</option>
                    <option value="Mendez">Mendez</option>
                </select> 
                </div>
                <div class="my-5">
                <button type="submit" class="btn btn-dark btn-lg my-5" name="update">Update</button>
                </div>
        </form>

    </div>

</body>

</html>

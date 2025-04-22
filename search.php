<?php
include 'connect.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search data</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <form method="post">
            <input type="text" placeholder="Search data" name="search">
             <button class="btn btn-dark btn-sm" name="submit">Search</button>
        </form>
        <div class="container my-5">
            <table class="table">

                <?php
                if(isset($_POST['submit'])){
                    $search = $_POST['search'];

                    $sql="Select * from seriescrud where id like '%$search%' or fname like '%$search%' or lname like '%$search%'";
                    $result=mysqli_query($con,$sql);
                    if($result){
                       if(mysqli_num_rows($result)>0){
                            echo '<thead>
                            <tr>
                            <th>Sl no</th>
                            <th>First Name</th>
                             <th>Last Name</th>
                             </tr>
                             </thead>
                            ';
                            while ($row=mysqli_fetch_assoc($result)){
                            echo '<tbody>
                            <tr>
                                <td><a href="searchData.php?data='.$row['id'].'"> '.$row['id'].'</a></td>
                                <td>'.$row['fname'].'</td>
                                <td>'.$row['lname'].'</td>
                            </tr>
                            </tbody>';
                            }
                            
                     
                     
                        }else{
                            echo '<h2 class=text-danger>Data not found</h2>';
                }
            }
        }
    
                ?>
                 
                
                    </table>
        </div>
    </div>
</body>
</html>

<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "crud data");
$edit = $_GET['edit'];

$sql = "select * from student where id= '$edit'";
$run = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_array($run)) {
    $id = $row["id"];
    $name = $row["name"];
    $address = $row["address"];
    $mobile = $row["mobile"];

    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $address = $_POST["address"];
        $mobile = $_POST["mobile"];

        $sql = "update form set name ='$name',address = '$address', mobile ='$mobile' where id = $edit";

        if (mysqli_query($connection, $sql)) {
            echo '<script> location.replace("index.php")</script>';
        } else {
            echo "error show" . $connection->error;
        }
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Crud Data </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class ="contianer">
        <div class ="row">
            <div class ="col-md-9">
                 <div class="card" style="paddding-left: 50px;">
                    <div class="card-header">
                        <h1> Crud Data <h1>
                     </div>
                    <div class="card-body">
                    <form action="add.php" method="post">
                        <div class="form-group">
                        <label >Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?php $name= ""; echo $name; ?>">
                        </div>

                        <div class="form-group">
                        <label >Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Address" value="<?php $address=""; echo $address; ?>">
                        </div>
                        
                        <div class="form-group">
                        <label >Mobile</label>
                        <input type="text" class="form-control" name="mobile" placeholder="Mobile" value="<?php $mobile=""; echo $mobile; ?>">
                        </div>
                        <br>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
 
                   </form>
                    </div>

                 </div>
            </div>    
        </div>
    </div>
</body>
</html>
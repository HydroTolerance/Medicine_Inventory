<?php
    include "config.php";
    $id = $_GET["ID"];
    if(isset($_POST["submit"])){
        $firstname = $_POST["FIRSTNAME"];
        $lastname = $_POST["LASTNAME"];
        $username = $_POST["USERNAME"];
        $password = $_POST["PASSWORD"];
        $role = $_POST["ROLE"];
        
        // Check if a new image file is selected
        if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
            $image = $_FILES["image"]["name"];
            $temp = $_FILES["image"]["tmp_name"];
            move_uploaded_file($temp, "images/" . $image);
            
            $sql = "UPDATE `staff_account` SET `FIRSTNAME` = '$firstname', `LASTNAME` = '$lastname', `USERNAME` = '$username', `PASSWORD` = '$password', `ROLE` = '$role', `image` = '$image' WHERE `ID` = $id";
        } else {
            $sql = "UPDATE `staff_account` SET `FIRSTNAME` = '$firstname', `LASTNAME` = '$lastname', `USERNAME` = '$username', `PASSWORD` = '$password', `ROLE` = '$role' WHERE `ID` = $id";
        }
        
        mysqli_query($variable, $sql);
        
        echo "<script>alert('Successfully Updated'); document.location.href = 'landing_staff.php'; </script>";
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="index.js"></script>
    <title>Document</title>
</head>
<body>
<div class="p-4 header bg-primary text-white">
        <h3 class="p-3 text-center">Medicine Inventory System</h3>
    </div>
    <div id="dashboard_table">
        <h2 class="p-4">Table</h2>
    </div>

<?php
$sql = "SELECT * FROM `staff_account` WHERE ID = $id LIMIT 1" ;
$result = mysqli_query($variable, $sql);
$rows = mysqli_fetch_assoc($result);
?>






<div class="container d-flex align-items-center justify-content-center">
        <div class="">
          <form action="" method="post"  autocomplete="off" enctype="multipart/form-data">
          <div>
                    <label for="formFileLg" class="form-label">Image:</label>
                    <input class="form-control form-control-lg" type="file" name="image">
                </div><br>
            <div>
              <label for="formFileLg" class="form-label">Firstname</label>
              <input class="form-control form-control-lg" type="text" placeholder="Medicine" name="FIRSTNAME" value="<?php echo $rows['FIRSTNAME']; ?>">
            </div><br>
            <div>
              <label for="formFileLg" class="form-label">Lastname</label>
              <input class="form-control form-control-lg" type="text" placeholder="Medicine" name="LASTNAME" value="<?php echo $rows['LASTNAME']; ?>">
            </div><br>
            <div>
              <label for="formFileLg" class="form-label">Username of staff</label>
              <input class="form-control form-control-lg" type="text" placeholder="Medicine" name="USERNAME" value="<?php echo $rows['USERNAME']; ?>">
            </div><br>
            <div>
              <label  for="">Paswword</label>
              <input class="form-control form-control-lg" type="text" placeholder="Medicine" name="PASSWORD" value="<?php echo $rows['PASSWORD']; ?>">
            </div><br>
            <div>
            <label for="formFileLg" class="form-label">ROLE:</label>
            <input class="form-control form-control-lg" type="text" placeholder="Medicine" name="ROLE" value="<?php echo $rows['ROLE']; ?>">
            </div><br>
            <div>
              <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
              <a href="landing_staff.php" class="btn btn-danger" >Cancel</a>
            </div>
                  
          </div>
  </div>

    </form>
</body>
</html>
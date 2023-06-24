<?php
require 'config.php';
if(isset($_POST["submit"])){
    $firstname = $_POST["FIRSTNAME"];
    $lastname = $_POST["LASTNAME"];
    $username = $_POST["USERNAME"];
    $role = $_POST["ROLE"];
    $password = $_POST["PASSWORD"];
    $shift = $_POST["SHIFT"];
  if($_FILES["image"]["error"] == 4){
    echo
    "<script> alert('Image Does Not Exist'); </script>"
    ;
  }
  else{
    $fileName = $_FILES["image"]['name'];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if ( !in_array($imageExtension, $validImageExtension) ){
      echo
      "<script>alert('Invalid Image Extension');</script>";
    }
    else if($fileSize > 1000000){
      echo"<script> alert('Image Size Is Too Large'); </script>";
    }
    else{
      $newImageName = $fileName;

      move_uploaded_file($tmpName, 'img/' . $newImageName);
      $query = "INSERT INTO staff_account (FIRSTNAME, LASTNAME, image, ROLE, PASSWORD, USERNAME, SHIFT) VALUES ('$firstname','$lastname','$fileName','$role','$password','$username','$shift')";
      mysqli_query($variable, $query);
      echo
      "<script> alert('Successfully Added'); document.location.href = 'landing_staff.php'; </script>";
    }
  }
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
<style>
  div.content {
  margin-left: 250px;
  padding: 1px 16px;
  height: 1000px;
}
</style>
<body>
<?php 
    include("sidebar.php");
    ?>
</div>
<div class="content">
<div class="p-4 header bg-primary text-white">
        <h3 class="p-3 text-center">Create Account Staff</h3>
    </div>
    <div id="dashboard_table">
        <h2 class="p-4">Table</h2>
    </div>

    <div class="container d-flex align-items-start justify-content-center">
        <div class="">
            <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
            <label for="formFileLg" class="form-label">Upload Image</label>
              <div>
              <div>
              <img  id="image-preview" class="d-flex align-items-start justify-content-center" style="border-radius:50%; margin-bottom:10px; margin-left:150px; background-color:rgb(221, 221, 221);" height="100px" width="100px">
              </div>
                <input class="form-control form-control-lg" type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value="" required>
              </div>
              <div >
                <label for="formFileLg" class="form-label">FIRSTNAME of Staff:</label>
                <input class="form-control form-control-lg" type="text" placeholder="FIRSTNAME" name="FIRSTNAME" required>
              </div>
              <div >
                <label for="formFileLg" class="form-label">LASTNAME of Staff:</label>
                <input class="form-control form-control-lg" type="text" placeholder="LASTNAME" name="LASTNAME" required>
              </div>
              <div >
                <label for="formFileLg" class="form-label">USERNAME of Staff:</label>
                <input class="form-control form-control-lg" type="text" placeholder="USERNAME" name="USERNAME" required>
              </div>
              <div >
                <label for="formFileLg" class="form-label">Password of Staff:</label>
                <input class="form-control form-control-lg" type="text" placeholder="PASSWORD" name="PASSWORD" required>
              </div>
              <div >
                <label for="formFileLg" class="form-label">ROLE:</label>
                <input class="form-control form-control-lg" type="text" placeholder="ROLE" name="ROLE" required>
              </div>
              <div >
                <label for="formFileLg" class="form-label">SHIFT of Staff:</label>
                <input class="form-control form-control-lg" type="datetime-local" placeholder="ROLE" name="SHIFT" required>
              </div>
                <div >
                    <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
                    <a class="btn btn-danger" href="landing_staff.php">Cancel</a>
                </div>
        </form>
        </div>
    </div>
</div>
</body>
</html>
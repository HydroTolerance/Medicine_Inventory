<?php
require 'config.php';
$id = $_GET["ID"];
if(isset($_POST["submit"])){
    $firstname = $_POST["FIRSTNAME"];
    $lastname = $_POST["LASTNAME"];
    $username = $_POST["USERNAME"];
    $password = $_POST["PASSWORD"];
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
      $sql = "UPDATE admin_account SET FIRSTNAME = '$firstname',LASTNAME='$lastname', image='$fileName', USERNAME ='$username', PASSWORD ='$password' WHERE ID = '$id'";
      mysqli_query($variable, $sql);
      echo
      "<script> alert('Successfully Added'); document.location.href = 'dashboard.php'; </script>";
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="index.js"></script>
    <title>Document</title>
</head>
<body>

<div>
<?php 
    include("sidebar.php");
    ?>
</div>
<div class="content">

<div class="p-4 header bg-primary text-white">
        <h3 class="p-3 text-center">Medicine Inventory System</h3>
    </div>
    <div id="dashboard_table">
        <h2 class="p-4">Settings</h2>
    </div>
<?php
$sql = "SELECT * FROM admin_account WHERE ID = '$id'" ;
$result = mysqli_query($variable, $sql);
$rows = mysqli_fetch_assoc($result);
?>
    <div class="container d-flex align-items-start justify-content-center">
        <div class="">
            <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
            <label for="formFileLg" class="form-label">Image Preview:</label>
              <div>
              <img  id="image-preview" class="d-flex align-items-start justify-content-center" style="border-radius:50%; margin-bottom:10px; margin-left:150px; background-color:rgb(221, 221, 221);" height="100px" width="100px">
              </div>
              <div>
                <label for="formFileLg" class="form-label">Upload Image</label>
                <input class="form-control form-control-lg" type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value="" required>
              </div>
              <div >
                <label for="formFileLg" class="form-label">First Name:</label>
                <input class="form-control form-control-lg" type="text" placeholder="FIRSTNAME" name="FIRSTNAME" value="<?php echo $rows['FIRSTNAME'];?>" required>
              </div>
              <div >
                <label for="formFileLg" class="form-label">Last Name:</label>
                <input class="form-control form-control-lg" type="text" placeholder="LASTNAME" name="LASTNAME" value="<?php echo $rows['LASTNAME'];?>" required>
              </div>
              <div >
                <label for="formFileLg" class="form-label">Username:</label>
                <input class="form-control form-control-lg" type="text" placeholder="USERNAME" name="USERNAME" value="<?php echo $rows['USERNAME'];?>" required>
              </div>
              <div >
                <label for="formFileLg" class="form-label">Password:</label>
                <input class="form-control form-control-lg" type="text" placeholder="PASSWORD" name="PASSWORD" value="<?php echo $rows['PASSWORD'];?>" required>
              </div><br>
                <div >
                    <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
                    <a class="btn btn-danger" href="dashboard.php">Cancel</a>
                </div>
        </form>
        </div>
    </div>
  
    </div>
    <script>
var input = document.getElementById('image');
var preview = document.getElementById('image-preview');

input.addEventListener('change', function() {
  var reader = new FileReader();

  reader.onload = function(e) {
    preview.src = e.target.result;
  };

  reader.readAsDataURL(input.files[0]);
});
</script>
</body>

</html>
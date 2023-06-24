<?php
require 'config.php';
if(isset($_POST["submit"])){
    $medicine = $_POST["medicine"];
    $quantity = $_POST["quantity"];
    $type = $_POST["type"];
    $date = $_POST["expirydate"];
    $price = $_POST["price"];
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
      $query = "INSERT INTO `medicines`(`medicine`,`image`, `quantity`, `type`,`price`, `expirydate`) VALUES ('$medicine','$fileName','$quantity','$type','$price','$date')";
      mysqli_query($variable, $query);
      echo "<script> alert('Successfully Added'); document.location.href = 'landing.php'; </script>";
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="index.js"></script>
    <title>Document</title>
    <style>
      div.content {
  margin-left: 250px;
  padding: 1px 16px;
  height: 1000px;
}
    </style>
</head>
<body>
<div>
<?php 
    include("sidebar.php");
    ?>
</div>
<div class="content">
  <div class="p-4 header bg-primary text-white">
          <h3 class="p-3 text-center">medicine Inventory System</h3>
      </div>
      <div id="dashboard_table">
          <h2 class="p-4">Dashboard > Table</h2>
      </div>

      <div class="container d-flex align-items-start justify-content-center">
          <div class="">
          <label for="formFileLg" class="form-label">Image Preview:</label>
              <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                <div>
                
                <img  id="image-preview" class="d-flex align-items-start justify-content-center" style="border-radius:50%; margin-bottom:10px; margin-left:150px; background-color:rgb(221, 221, 221);" height="100px" width="100px">
                  <input class="form-control form-control-lg" type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value="">
                </div>
                <div >
                  <label for="formFileLg" class="form-label">Name of Medicine:</label>
                  <input class="form-control form-control-lg" type="text" placeholder="Medicine" name="medicine" required>
                </div>
                <div >
                  <label for="formFileLg" class="form-label">Quantity of Medicine:</label>
                  <input class="form-control form-control-lg" type="number" min="0" step="1" name="quantity" required>
                </div>
                  
                  
                  <div >
                  <label for="formFileLg" class="form-label">Types</label>
                  <select name="type" id="usertype"  class="form-select form-select" aria-label=".form-select" required>
                      <option value="" hidden selected></option>
                      <option value="Capsule">Capsule</option>
                      <option value="Tablet">Tablet</option>
                      <option value="Liquid">Liquid</option>
                      <option value="Drops">Drops</option>
                      <option value="Injection">Injection</option>
                  </select><br>
                  <label for="formFileLg" class="form-label">Prices</label><br>
                      <input type="number" min="0" step="1" name="price" class="form-control form-control-lg" required><br>
                      <label for="formFileLg" class="form-label">Date of Expiration</label><br>
                      <input type="date" name="expirydate" class="form-control form-control-lg" ><br>
                      <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
                      <a class="btn btn-danger" href="landing.php">Cancel</a>
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
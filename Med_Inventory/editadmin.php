<?php
    include "config.php";
    $id = $_GET["id"];
    if(isset($_POST["submit"])){
        $medicine = $_POST["medicine"];
        $quantity = $_POST["quantity"];
        $sales_quantity = $_POST["sales_quantity"];
        $type = $_POST["type"];
        $price = $_POST["price"];
        $date = $_POST["expirydate"];
          $sql = "UPDATE `medicines_admin` SET `medicine` = '$medicine',`quantity`='$quantity',`sales_quantity`='$sales_quantity',`type`='$type',`price`='$price',`expirydate`='$date' WHERE `id` = $id";
          mysqli_query($variable, $sql);
          echo
          "<script> alert('Successfully Added'); document.location.href = 'landingadmin.php'; </script>";
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
        <h2 class="p-4">Medicine</h2>
    </div>

<?php
$sql = "SELECT * FROM `medicines_admin` WHERE id = $id LIMIT 1" ;
$result = mysqli_query($variable, $sql);
$rows = mysqli_fetch_assoc($result);
?>






<div class="container d-flex align-items-center justify-content-center">
        <div class="">
          <form action="" method="post"  autocomplete="off" enctype="multipart/form-data">

            <div>
              <label for="formFileLg" class="form-label">Name of Medicine:</label>
              <input class="form-control form-control-lg" type="text" placeholder="Medicine" name="medicine" value="<?php echo $rows['medicine']; ?>">
            </div><br>
            <div>
              <label for="formFileLg" class="form-label">Quantity of Medicine:</label>
              <input class="form-control form-control-lg" type="number" min="0" step="1" name="quantity" value="<?php echo $rows['quantity'];?>">
            </div><br>
            <div>
              <label for="formFileLg" class="form-label">Number of Items Sold</label>
              <input class="form-control form-control-lg" type="number" min="0" step="1" name="sales_quantity" value="<?php echo $rows['sales_quantity'];?>">
            </div><br>
            <div>
            <label  for="">Types</label>
                  <select class="form-control form-control-lg" name="type" id="usertype">
                      <option hidden selected></option>
                      <option  value="Capsule" id="Capsule" <?php echo ($rows['type'] == 'Capsule')? "selected":""; ?>>Capsule</option>
                      <option value="Tablet" id="Tablet" <?php echo ($rows['type'] == 'Tablet')? "selected":""; ?>>Tablet</option>
                      <option value="Liquid" id="Liquid" <?php echo ($rows['type'] == 'Liquid')? "selected":""; ?>>Liquid</option>
                      <option value="Drops" id="Drops" <?php echo ($rows['type'] == 'Drops')? "selected":""; ?>>Drops</option>
                      <option value="Injection" id="Injection" <?php echo ($rows['type'] == 'Injection')? "selected":""; ?>>Injection</option>
                  </select>
            </div><br>
            <div>
              <label  for="">Price</label>
              <input class="form-control form-control-lg" type="number" min="0" step="1" name="price" value="<?php echo $rows['price'];?>">
            </div><br>
            <div>
            <label for="formFileLg" class="form-label">Expiration Date:</label>
              <input class="form-control form-control-lg" type="date" name="expirydate" id="datetime" value="<?php echo $rows['expirydate'];?>">
            </div><br>
            <div>
              <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
              <a href="landing.php" class="btn btn-danger" >Cancel</a>
            </div>
                  
          </div>
  </div>

    </form>
</body>
</html>
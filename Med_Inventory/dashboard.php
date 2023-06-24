<?php
    require "config.php";
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(!empty($_SESSION["ID"])){
        $id = $_SESSION["ID"];
        $result = mysqli_query($variable, "SELECT * FROM admin_account WHERE ID = $id");
        $row = mysqli_fetch_assoc($result); 
    }

    else{
        header("location: login.php");
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}
.main {
  height: 600px;
  flex: 70%;
  padding: 20px;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  
}
#box {
  height: 200px;
  width: 439px;
  padding: 10px;
  display: flex;
  flex-direction: column;
  color: white;
  border-top-left-radius: 25px;
  border-top-right-radius: 25px;
  margin-bottom: 30px;
}

h5{
  width: 420px;
  margin-left: -2.5%;
  padding: 20px;
  text-align: center;
}
#box2 {
  background-color: white;
  height: 200px;
  width: 400px;
  padding: 30px;
}

div.content {
  margin-left: 250px;
  padding: 1px 16px;
  height: 1000px;
}

#arrow{
  background-color: white;
  width: 20px;
  height: 20px;
  border-radius: 50%;
}
.box_io {
  padding: 30px;
  background-color: white;
}

</style>
<body>
<?php 
    include("sidebar.php");
    ?>
</div>
<div class="content">
    <div>
        <?php 
            include("adminnavbardash.php");
        ?>
    </div>
    <div style="background-color: rgb(220, 220, 220);height: 100px;width: auto;margin-top: 0px;border-top: 1px solid black;border-bottom: 1px solid black;">
          <p style="margin-top: 25px; margin-left:30px; font-size: 30px;">Dashboard</p>
      </div>
      <div>
  <div class="main">
    <div id="box" style="background-image: linear-gradient(to right, red, red, salmon);"><h1><?php $result = mysqli_query($variable, "SELECT SUM(quantity) FROM medicines WHERE expirydate < NOW()");while($rows = mysqli_fetch_array($result)){?><?php echo $rows['SUM(quantity)'];}?></h1><h2>Expired Product</h2><a href="expired.php" style="color: white; text-decoration:none;"><h5 style="background-color: red;">More Info <img id="arrow" src="assets/arrow.png"> </h5><img src=""></a></div>
    <div id="box" style="background-image: linear-gradient(to right, lightblue, navy, navy);"><h1><?php $result = mysqli_query($variable, "SELECT SUM(quantity) FROM medicines"); while($rows = mysqli_fetch_array($result)){?><?php echo $rows['SUM(quantity)'];}?></h1><h2>Total Products</h2></div>
    <div id="box" style="background-image: linear-gradient(to right, hotpink, deeppink, deeppink);"><h1><?php $result = mysqli_query($variable, "SELECT COUNT(quantity) FROM medicines WHERE quantity = 0");while($rows = mysqli_fetch_array($result)){?><?php echo $rows['COUNT(quantity)'];}?></h1><h2>Out of Stock</h2><a href="stock.php" style="color: white; text-decoration:none;"><h5 style="background-color: deeppink;">More Info <img id="arrow" src="assets/arrow.png"></h5></a></div>
    <div id="box" style="background-image: linear-gradient(to right, lightgreen, green, green);"><h1>₱<?php $result = mysqli_query($variable, "SELECT SUM(price*quantity) FROM medicines"); while($rows = mysqli_fetch_array($result)){?><?php echo $rows['SUM(price*quantity)'];}?></h1><h2>Total Prices</h2></div>
    <div id="box" style="background-image: linear-gradient(to right, violet, darkmagenta, darkmagenta);"><h1><?php $result = mysqli_query($variable, "SELECT SUM(sales_quantity) FROM medicines");while($rows = mysqli_fetch_array($result)){?><?php echo $rows['SUM(sales_quantity)'];}?></h1><h2>Total Sales</h2></div>
    <div id="box" style="background-image: linear-gradient(to right, coral, darkorange, darkorange);"><h1>₱<?php $result = mysqli_query($variable, "SELECT SUM(price*sales_quantity) FROM medicines"); while($rows = mysqli_fetch_array($result)){?><?php echo $rows['SUM(price*sales_quantity)'];}?></h1><h2>Total Income</h2></div>
</div>
    
  </div>
</div>
</div>
   
</body>
</html>
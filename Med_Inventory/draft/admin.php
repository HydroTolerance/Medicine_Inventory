

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
<html>
<head>
<title>Page Title</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style2.css">
<style>
* {
  box-sizing: border-box;
}

/* Style the body */
body {
  font-family: Arial;
  margin: 0;
  background-color:#fff;
}

/* Header/logo Title */
.header {
  padding: 20px;
  text-align: left;
  background: #ADD8E6;
  color: white;
}

/* Column container */
.row {  
  display: flex;
  flex-wrap: wrap;
}

.side {
  flex: 10%;
  background-color: #ADD8E6;
  border-right: solid;
  padding: 20px;
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
  width: 420px;
  padding: 10px;
  display: flex;
  flex-direction: column;
  color: white;
  border-top-left-radius: 25px;
  border-top-right-radius: 25px;
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

.footer {
  padding: 10px;
  text-align: right;
  background: #ADD8E6;
  font-size: 10px
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
.admintext{
  color: rgb(52, 147, 215);
  font-size: 30px;
  font-weight: bolder;
}

#access{
  text-align: right;
  color: red;
}
#dashboard_table {
  background-color: rgb(244, 244, 244);
  height: 100px;
  width: auto;
  margin-top: 0px;
  border-top: 1px solid black;
  border-bottom: 1px solid black;
}
.dashboard_text{
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  margin-top: 30px;
  margin-left: 20px;
  font-size: 30px;
}

.side-bar{
  width: 230px;
  height: 650px;
  background-color: rgb(198, 230, 253);
}
 /* Navbar container */
 .navbar {
  overflow: hidden;
  background-color: #333;
  font-family: Arial;
}



@media screen and (max-width: 700px) {
  .row, .navbar, .main, #box{   
    flex-direction: column;
    justify-content: space-between;
  }
}

@media screen and (max-height: 900px) {
  #box{   
    flex-direction: column;
    justify-content: space-between;
  }
}
</style>

</head>

<body>
<div class="sidebar">
  <a class="active" href="#home">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
</div>
    <div id="dashboard_table">
        <h2 class="dashboard_text">Dashboard</h2>
    </div>
<div>
</div> 
    <div class="main">
      <div id="box" style="background-image: linear-gradient(to right, red, red, salmon);"><h1><?php $result = mysqli_query($variable, "SELECT SUM(quantity) as expired FROM medicines WHERE expirydate < NOW() UNION SELECT SUM(quantity) FROM medicines_admin WHERE expirydate < NOW()");while($rows = mysqli_fetch_array($result)){?><?php echo $rows['expired'];}?></h1><h2>Expired Product</h2><h5 style="background-color: red;">More Info <img id="arrow" src="assets/arrow.png"> </h5><img src=""></div>
      <div id="box" style="background-image: linear-gradient(to right, lightblue, navy, navy);"><h1><?php $result = mysqli_query($variable, "SELECT SUM(quantity) as totalproducts FROM medicines UNION SELECT SUM(quantity) FROM medicines_admin"); while($rows = mysqli_fetch_array($result)){?><?php echo $rows['totalproducts'];}?></h1><h2>Total Products</h2><h5 style="background-color: navy;">More Info <img id="arrow" src="assets/arrow.png"></h5></div>
      <div id="box" style="background-image: linear-gradient(to right, hotpink, deeppink, deeppink);"><h1><?php $result = mysqli_query($variable, "SELECT COUNT(quantity) as outstock FROM medicines WHERE quantity = 0 UNION SELECT COUNT(quantity) FROM medicines_admin WHERE quantity = 0");while($rows = mysqli_fetch_array($result)){?><?php echo $rows['outstock'];}?></h1><h2>Out of Stock</h2><h5 style="background-color: deeppink;">More Info <img id="arrow" src="assets/arrow.png"></h5></div>
      <div id="box" style="background-image: linear-gradient(to right, lightgreen, green, green);"><h1>₱<?php $result = mysqli_query($variable, "SELECT SUM(price*quantity) as totalprice  FROM medicines UNION SELECT SUM(price*quantity) FROM medicines_admin"); while($rows = mysqli_fetch_array($result)){?><?php echo $rows['totalprice'];}?></h1><h2>Total Prices</h2><h5 style="background-color: green;">More Info <img id="arrow" src="assets/arrow.png"></h5></div>
      <div id="box" style="background-image: linear-gradient(to right, violet, darkmagenta, darkmagenta);"><h1><?php $result = mysqli_query($variable, "SELECT SUM(sales_quantity) as sales FROM medicines UNION SELECT SUM(sales_quantity) FROM medicines_admin");while($rows = mysqli_fetch_array($result)){?><?php echo $rows['sales'];}?></h1><h2>Total Sales</h2><h5 style="background-color: purple;">More Info <img id="arrow" src="assets/arrow.png"></h5></div>
      <div id="box" style="background-image: linear-gradient(to right, coral, darkorange, darkorange);"><h1>₱<?php $result = mysqli_query($variable, "SELECT SUM(price*sales_quantity) as totalincome FROM medicines UNION SELECT SUM(price*sales_quantity) FROM medicines_admin"); while($rows = mysqli_fetch_array($result)){?><?php echo $rows['totalincome'];}?></h1><h2>Total Income</h2><h5 style="background-color: darkorange;">More Info <img id="arrow" src="assets/arrow.png"></h5></div>
    </div>
    
  </div>
</div>
<!-- Footer -->
<div class="footer">
      <h1>Gizmo™</h1>
    </div>



</body>
</html>
<?php
    require "config.php";
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(!empty($_SESSION["ID"])){
        $id = $_SESSION["ID"];
        $result = mysqli_query($variable, "SELECT * FROM staff_account WHERE ID = $id");
        $row = mysqli_fetch_assoc($result); 
    }

    else{
        header("location: login2.php");
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
body {
  margin: 0;
  padding: 0;
  font-family: "Lato", sans-serif;
}
.sidebar {
  margin: 0;
  padding: 0;
  width: 270px;
  background-color: #ADD8E6;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #04AA6D;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}
div.content {
  margin-left: 250px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
<body>
<div class="sidebar">
    <table style="margin-top: 20px; margin-bottom: -20px; margin-left: 20px;">
        <tr>
            <td><img src="img/<?php echo $row["image"]; ?>" height="80px" width="80px" style="border-radius: 50%; border: 2px solid black; margin-top:20px; margin-bottom: 20px;"> </td>
            <td><h3 style="margin-left: 25px; margin-bottom:-10px;" ><?php echo $row["USERNAME"]; ?></h3>
            <table style="margin-left: 25px;">
                <tr>
                    <td><p style="font-size:10px; margin-top:10px;">Online</p></td>
                    <td><img id="circle" src="assets/greencircle.png" height="10px" width="10px" style="margin-top: -10px; margin-left:10px;"></td>
                </tr>
            </table></td>
            
        </tr>
        <tr>
            <td></td>
        </tr>
    </table>
    <hr>
    <table>
        <tr class="tr">
            <td > <a href="dashboard1.php" class="td" style="cursor: pointer; margin-left: 10px; margin-bottom: 0px"><span class="material-icons" style="font-size:30px; margin-right: 5px;">vaccines</span><label for="" style="font-size:20px;">Dashboard</label></td></a>
        </tr>
        <tr class="tr">
            <td><a href="landing_account.php" class="td" style="cursor: pointer; margin-left: 10px;"><span class="material-icons" style="font-size:30px; margin-right: 5px; ">groups</span><label for="" style="font-size:20px;"> Staffs</label></td></a>
        </tr>
        <tr class="tr">
            <td><a href="landingstaff.php" class="td" style="cursor: pointer; margin-left: 10px;"><span class="material-icons" style="font-size:30px; margin-right: 5px; ">medical_services</span><label for="" style="font-size:20px;"> Medicines</label></td></a>
        </tr>
        <tr class="tr">
            <td><a href="landingadmin1.php" class="td" style="cursor: pointer; margin-left: 10px;"><span class="material-icons" style="font-size:30px; margin-right: 5px; ">medical_services</span><label for="" style="font-size:20px;">Pending Request</label></td></a>
        </tr>
        <tr class="tr">
            <td><a href="logoutstaff.php" class="td" style="cursor: pointer; margin-left: 10px;"><span class="material-icons" style="font-size:30px;">logout</span><label for="" style="font-size:20px;"> Logout</label></td></a>
        </tr>
    </table>
</div>
</body>
</html>
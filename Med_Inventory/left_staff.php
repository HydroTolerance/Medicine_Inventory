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
        header("location: login.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Left</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        .td{
            text-decoration: none;
            color: black;
            cursor: pointer; 
        }
    </style>
</head>
<body class="left" style="background-color: #ADD8E6"><br><br><br>
<h2 align="center">Medicine Management</h2>
<hr>
        <table style="margin-top: -20px; margin-bottom: -20px; margin-left: 40px;">
            <tr>
                <td><img src="img/<?php echo $row["image"]; ?>" height="80px" width="80px" style="border-radius: 50%; border: 2px solid black; margin-top:20px; margin-bottom: 20px;"> </td>
                <td><h2 style="margin-left: 25px; margin-bottom:-10px;" ><?php echo $row["USERNAME"]; ?></h2>
                <table style="margin-left: 25px;">
                    <tr>
                        <td><p style="font-size:20px;">Online</p></td>
                        <td><img id="circle" src="assets/greencircle.png" height="10px" width="10px"></td>
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
            <td > <a href="Staff.php" target="right" class="td" style="cursor: pointer; margin-left: 30px; margin-bottom: 30px"><span class="material-icons" style="font-size:50px; margin-right: 20px;">vaccines</span><label for="" style="font-size:30px; margin-bottom: 30px">Dashboard</label></td></a>
        </tr>
        <tr class="tr">
            <td><a href="landing_account.php" target="right" class="td" style="cursor: pointer; margin-left: 30px;"><span class="material-icons" style="font-size:50px; margin-right: 20px; ">groups</span><label for="" style="font-size:30px;"> Staffs</label></td></a>
        </tr>
        <tr class="tr">
            <td><a href="landingstaff.php" target="right" class="td" style="cursor: pointer; margin-left: 30px;"><span class="material-icons" style="font-size:50px; margin-right: 20px; ">medical_services</span><label for="" style="font-size:30px; margin-bottom: 40px;"> Medicines</label></td></a>
        </tr>
        <tr class="tr">
            <td><a href="logoutstaff.php" target="_top" class="td" style="cursor: pointer; margin-left: 30px;"><span class="material-icons" style="font-size:50px; margin-right: 20px; ">logout</span><label for="" style="font-size:30px;"> Logout</label></td></a>
        </tr>
    </table>
</body>
</html>
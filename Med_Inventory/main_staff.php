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
    <title>FrameSet</title>
</head>
<frameset cols="20%,80%" border="1" bordercolor="black">
    <frame src="left_staff.php" scrolling="no" noresize name="left">
    <frame src="Staff.php" scrolling="yes" noresize name="right">
</frameset>
</html>
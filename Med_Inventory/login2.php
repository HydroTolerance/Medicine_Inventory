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
        <title>Log in</title>
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <div class="main">
            <div class="sub">
                <h2>Log In for Admin</h2>
                <p class="reg">Please enter your USERNAME and PASSWORD.</p>
            </div>
            <form name="login" method="POST" action="checkloginadmin.php">
                <label for="USERNAME">USERNAME</label>
                <input class="input" type="USERNAME" id="USERNAME" name="USERNAME" required>

                <label for="PASSWORD">PASSWORD</label>
                <input class="input" type="PASSWORD" id="PASSWORD" name="PASSWORD" required>

                <input type="submit" value="Submit">
                
            </form>

            <div class="sub">
                <h2>Log In for Staff</h2>
                <p class="reg">Please enter your USERNAME and PASSWORD.</p>
            </div>
            <form name="login" method="POST" action="checkloginstaff.php">
                <label for="USERNAME">USERNAME</label>
                <input class="input" type="USERNAME" id="USERNAME" name="USERNAME" required>

                <label for="PASSWORD">PASSWORD</label>
                <input class="input" type="PASSWORD" id="PASSWORD" name="PASSWORD" required>

                <input type="submit" value="Submit">
                <h2>Invalid Username or Password</h2>
            </form>
        </div>

    </body>
</html>
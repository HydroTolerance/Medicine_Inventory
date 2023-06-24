<?php
    include 'config.php';
    if(isset($_POST['submit'])){
        $title=$_POST['title'];
        $proponentOne=$_POST['proponentOne'];
        $proponentTwo=$_POST['proponentTwo'];
        $proponentThree=$_POST['proponentThree'];
        $zone=$_POST['zone'];
        $program=$_POST['program'];
        $adviser=$_POST['adviser'];
        $statistian=$_POST['statistician'];
        $status=$_POST['status'];
    
       $sql= "INSERT INTO `research`(`uuid`, `title`, `proponentOne`, `proponentTwo', `proponentThree`, `zone`, `program`, `adviser`,`statistician`,`status`) 
        VALUES ('$uuid','$title','$proponentOne','$proponentTwo','$proponentThree','$zone','$program','$adviser','$statistian','$status')";
        $result=mysqli_query($variable,$sql);
        if($result){
          //echo "Data inserted successfully";
          header("Location: landing.php?msg=New record created successfully");
        } else{
            echo "Failed: " . mysqli_error($variable);
            //die(mysqli_error($conn));
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Add</title>
        <!-- Bootstrap 5 CSS -->
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,600;0,700;1,400&display=swap');
            :root{
                --main-color: #b30000;
                --color-dark: #1d2231;
                --text-grey: #8390a2;
            }
            *{
                padding: 0;
                margin: 0;
                box-sizing: border-box;
                list-style-type: none;
                text-decoration: none;
                font-family: 'Poppins', sans-serif;
            }
            .sidebar{
                width: 345px;
                position: fixed;
                left: 0;
                height: 0;
                height: 100%;
                background: var(--main-color);
                z-index: 100;
                margin-top: -60px;
                transition: width 300ms;

            }
            .sidebar-brand{
                height: 90px;
                padding: 1rem 0rem 1rem 2rem;
                color: #fff;
            }
            .sidebar-brand span{
            display: inline-block;
            padding-right: 1rem;
            margin-left: 70px;
            font-weight: 700;
            font-size: 25px;
            margin-top: -60px;
            }
            .sidebar-menu{
                margin-top: 1rem;
            }
            .sidebar-menu li{
                width: 100%;
                margin-bottom: 1.7rem;
                padding-left: 2rem;
            }
            .sidebar-menu a{
                padding-left: 1rem;
                display: block;
                color: #fff;
                font-size: 1.1rem;
            }
            .sidebar-menu a.active{
                background: #fff;
                padding-top: 1rem;
                padding-bottom: 1rem;
                color: var(--main-color);
                border-radius: 30px 0px 0px 30px;
            }
            .sidebar-menu a span:first-child{
                font-size: 1.5rem;
                padding-right: 1rem;
            }
            #nav-toggle:checked + .sidebar{
                width: 70px;
            }
            #nav-toggle:checked + .sidebar .sidebar-brand,
            #nav-toggle:checked + .sidebar li{
                padding-left: 1rem;
                text-align: center;
            }
            #nav-toggle:checked + .sidebar li a{
                padding-left: 0rem;
            }
            #nav-toggle:checked + .sidebar .sidebar-brand h2 span:last-child,
            #nav-toggle:checked + .sidebar li a span:last-child{
                display: none;
            }
            #nav-toggle:checked ~ .main-content{
                margin-left: 70px;
            }
            #nav-toggle:checked ~ .main-content header{
                width: calc(100% - 70px);
                left: 70px;
            }
            .main-content{
                transition: margin-left 300ms;
                margin-left: 345px;
            }
            header{
                background: #fff;
                    display: flex;
                    justify-content: space-between;
                    padding: 1rem 1.5rem;
                    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
                    position: fixed;
                    left: 345px;
                    width: calc(100% - 345px);
                    top: 0;
                    z-index: 100;
                    transition: left 300ms;
            }
            #nav-toggle{
                display: none;
            }
            header h2{
                color: #222;
            }
            header label span{
                font-size: 1.7rem;
                padding-right: 1rem;
            }
            .search-wrapper{
                border: 1px solid #ccc;
                border-radius: 30px;
                height: 50px;
                display: flex;
                align-items: center;
                overflow-x: hidden;
            }
            .search-wrapper span{
                display: inline-block;
                padding: 0rem 1rem;
                font-size: 1.5rem;
            }
            .search-wrapper input{
                height: 100%;
                padding: .5rem;
                border: none;
                outline: none;
            }
            .user-wrapper{
                display: flex;
                align-items: center;
            }
            .user-wrapper img{
                border-radius: 50%;
                margin-right: 1rem;
            }
            .user-wrapper small{
                display: inline-block;
                color: var(--text-grey);
            }
            .b{
                font-size: 25px;
                font-weight: 700;
            }
        </style>
    </head>
    <body>
        <div class="sidebar">
            <div class="sidebar-brand">
            <h2><img src="image/UMTClogo.png" width="50px" height="50px" alt="Logo" class="logo"><span> University of <br>Mindanao</span></h2>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="dashboard.php"><span class="las la-home"></span>
                        <span>Home</span></a>
                    </li>
                    <li>
                        <a href="add.php" class="active"><span class="las la-plus-circle"></span>
                        <span>Add Research</span></a>
                    </li>
                    <li>
                        <a href="edit.php"><span class="las la-edit"></span>
                        <span>Edit Research</span></a>
                    </li>
                    <li>
                        <a href="delete.php"><span class="las la-trash"></span>
                        <span>Delete Research</span></a>
                    </li>
                    <li>
                        <a href="reports.php"><span class="las la-file-invoice"></span>
                        <span>Reports</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content">
            <header>
                <h2 class="b">
                    <label for="">
                        <span class="las la-bars"></span>
                    </label>
                    Add Research
                </h2>
                <div class="user-wrapper">
                    <img src="image/UMTClogo.png" width="40px" height="40px" alt="">
                    <div>
                        <small>Welcome</small>
                    </div>
                </div>
            </header>

                  </button>

                  </div>
                  </div>


    <section class="h-1" style="margin-left: 280px; margin-top: 60px;">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="flex h-100 items-center justify-content-lg-center">
					<div class="text-center my-5">
                        <div class="card shadow-lg">
                            <div class="card-body p-5">
                                <div style="text-align: center;">
                                    <div style="position: relative; top: -20px;">
                                        <img src="https://edukasyon-production.s3.amazonaws.com/uploads/school/avatar/2117/UM-TAGUM.png" alt="logo" width="125" style="position:static; top: 65; left: 0%; transform: translateX(70%);">
                                    </div>
                                </div>




<form method="post">
    <div class="mb-3">
        <label for="uuid" class="form-label" style="font-weight:bold; font-family: Arial, sans-serif;">UUID</label>
        <input type="uuid" class="form-control" placeholder="Enter UID" name="uuid" id="uuid">
    </div>
    <div class="mb-3">
                <label for="title" class="form-label" style="font-weight:bold; font-family: Helvetica, Arial, sans-serif;">Title</label>
                <input type="title" class="form-control" placeholder="Enter Research Title" name="title" id="title">
            </div>
            <div class="mb-3">
                <label for="proponentOne" class="form-label" style="font-weight:bold; font-family: Helvetica, Arial, sans-serif;">Proponents</label>
                <input type="proponentOne" class="form-control" name="proponentOne" id="proponentOne">
            </div>
            <div class="mb-3">
                <label for="proponentTwo" class="form-label" style="font-weight:bold; font-family: Helvetica, Arial, sans-serif;"></label>
                <input type="proponentTwo" class="form-control" name="proponentTwo" id="proponentTwo">
            </div>
            <div class="mb-3">
                <label for="proponentThree" class="form-label" style="font-weight:bold; font-family: Helvetica, Arial, sans-serif;"></label>
                <input type="proponentThree" class="form-control" name="proponentThree" id="proponentThree">
            </div>
    <div class="mb-3">
        <label for="zone" class="form-label" style="font-weight:bold; font-family: Helvetica, Arial, sans-serif;">Zone</label>
        <select id="example-dropdown" class="form-select" name="zone">
        <option value="">Select a Zone</option>
            <optgroup label="Zone 1">
                <option value="DBAE">DBAE</option>
                <option value="DBA">DBA</option>
                <option value="HM">HM</option>
                <option value="TM">TM</option>
            </optgroup>
            <optgroup label="Zone 2">
                <option value="DCJE">DCJE</option>
                <option value="CS">CS</option>
                <option value="IT">IT</option>
                <option value="DEE">DEE</option>
            </optgroup>
            <optgroup label="Zone 3">
                <option value="DASE">DASE</option>
                <option value="DTE">DTE</option>
            </optgroup>
        </select>
    </div>
            <div>
                <label for="program" class="form-label" style="font-weight:bold; font-family: Helvetica, Arial, sans-serif;">Program</label>
                <select id="example-single" name="program">
                    <option value="">Select a Program</option>
                    <option value="BS in Information Technology">BS in Information Technology</option>
                    <option value="BS in Computer Science">BS in Computer Science</option>

                </select>
                </div>
            
            
            <div class="mb-3">
                <label for="adviser" class="form-label" style="font-weight:bold; font-family: Helvetica, Arial, sans-serif;">Adviser</label>
                <input type="adviser" class="form-control" name="adviser" id="adviser">
            </div>
            <div class="mb-3">
                <label for="statistician" class="form-label" style="font-weight:bold; font-family: Helvetica, Arial, sans-serif;">Statistician</label>
                <input type="statistician" class="form-control" name="statistician" id="statistician">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label" style="font-weight:bold; font-family: Helvetica, Arial, sans-serif;">Status</label>
                <input type="status" class="form-control" name="status" id="status">
            </div>

            <a href="" class="btn btn-primary ms-auto" name="submit" style="background-color: #bc0000">
                Submit</a>
</form>
    </div>





</body>
</html>
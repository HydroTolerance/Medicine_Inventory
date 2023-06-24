<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #333;
  overflow-x: hidden;
  transition: 1.0s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 50px;
  text-decoration: none;
  font-size: 25px;
  color: white;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: white;
  color: black;
  padding: 10px 15px;
}

.openbtn:hover {
  background-color: #ADD8E6;
  color: white;
}

#main {
  transition: margin-left .5s;
  padding: 0px;
}
#navbar{
	width: 1000px;
	 display: flex;
  	flex-wrap: wrap;
}

#navnav{
	font-size: 25px;
	margin-top: 10px;
	margin-left: 20px;
	text-align: left;
	transition: 1.0s;
}

#usernav{
  text-align: right;
  width: 70%;
  transition: 1.0s;
}

.row {  
  display: flex;
  flex-wrap: wrap;
}

#container{
  display: flex;
  padding: 20px;
}

#mySidebar p{
  color: white;
  width: 100%;
  text-align: center;
}

#title{
  font-size: 20px;
  font-weight: bold;
}

#profilepic{
  width: 60px;
  height: 60px;
  border-radius: 50%;
}
#admininfo{
  display: flex;
  flex-wrap: nowrap;
  flex-direction: row;
  margin-left: 50px;
  margin-top: -40px;
}
#circle{
  width: 10px;
  height: 10px;
  margin-top: 20px;
  margin-left: -120px;
}

#active{
  background-color: white;
  color: black;
}
#clickables a:hover{
  background-color: white;
  color: black;
}
.row {  
  display: flex;
  flex-wrap: wrap;
}

.side {
  flex: 10%;
  background-color: #f1f1f1;
  padding: 20px;
}

.main {
  flex: 70%;
  background-color: white;
  padding: 20px;
}

#header{
	color: black;
	margin-left: 20px;
	transition: 1.0s;
}

#dashmain{
  display: flex;
  justify-content: space-between;
}

#sticky{
  width: 80px;
  height: 80px;

}

@media screen and (max-width: 450px) {
  .sidebar {padding-top: 15px; font-weight: italic;}
  .sidebar a {font-size: 18px; font-weight: italic;}
  #usernav{
    position: absolute;
    text-align: right;
    width: 70%;
  }
}
</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>

<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <p id="title">Medicine Management</p>
  <hr>
    <div id="container">
      <img id="profilepic" src="../assets/profilepic.png"> <p>Staff User</p>
  </div>
  <div id="admininfo">
    <p>Online</p>
    <img id="circle" src="../assets/greencircle.png">
  </div>
  <hr>
  <div id="clickables">
  <a href="../pages/staff.php">Dashboaard</a>
  <a href="../php/staffsstaff.php">Staffs</a>
  <a href="#">Medicines</a>
  <a href="#">Table</a>
  </div>
</div>
	<div id="navbar" style="width: 100%; background-color: #ADD8E6;">
		<div id="main">
    <div class="design">
        <label class="admintext">Admin Login</label>
        <div class="end">
          <div class="dropdown">
            <div class="circle-red">
              <h4 style="margin-top: 4px;">
            <?php $result = mysqli_query($variable, "SELECT COUNT(medicine) FROM medicines WHERE expirydate BETWEEN CURDATE() and DATE_ADD(CURDATE(), INTERVAL 30 DAY)");while($rows = mysqli_fetch_array($result)){?><?php echo $rows['COUNT(medicine)'];}?>
            </h4>
            </div>
            <button class="dropbtn"><span class="material-symbols-outlined" style="font-size: 60px;">notifications</span>
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <?php $result = mysqli_query($variable, "SELECT medicine FROM medicines WHERE expirydate BETWEEN CURDATE() and DATE_ADD(CURDATE(), INTERVAL 30 DAY)");
                while($rows = mysqli_fetch_array($result)){?>
                <table style="padding: 20px;"> 
                    <tr>
                        <td><?php echo "Your product will be Expired in 30 days" . $rows['medicine']?>  </td>
                    </tr>
                    
                <?php
              } ?></td>
                  </tr>
                </table>
                
            
            </div>
              <a href="notes.php"><span class="material-symbols-outlined" style="font-size: 60px; margin-top: 15px; margin-right:25px; color:#000;">assignment_add</span></a>
              <a href="settings.php?ID=<?php echo $row['ID']?>"><span class="material-symbols-outlined" style="font-size: 60px; margin-top: 15px; color:#000;">settings</span></a>
        </div>

      </div>
  </div>
  <hr color="black" size="1px">
  
</div>
<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "380px";
  document.getElementById("usernav").style.marginLeft = "-150px";
  document.getElementById("navnav").style.marginLeft = "350px";
  document.getElementById("header").style.marginLeft = "400px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("usernav").style.marginLeft = "0px";
  document.getElementById("navnav").style.marginLeft = "20px";
  document.getElementById("header").style.marginLeft = "20px";
}
</script>
</body>
</html>
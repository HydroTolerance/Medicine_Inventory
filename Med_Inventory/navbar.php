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
</head>
<body>

<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <p id="title">Medicine Management</p>
  <hr>
    <div id="container">
      <img id="profilepic" src="assets/profilepic.png"> <p>Admin User</p>
  </div>
  <div id="admininfo">
    <p>Online</p>
    <img id="circle" src="assets/greencircle.png">
  </div>
  <hr>
  <div id="clickables">
  <a href="Admin.php">Dashboard</a>
  <a href="staffs.php">Staffs</a>
  <a href="landing.php">Medicines</a>
  <a href="logout.php">Logout</a>
  </div>
</div>
	<div id="navbar" style="width: 100%; background-color: #ADD8E6;">
		<div id="main">
		  <button class="openbtn" onclick="openNav()">☰</button>  
		</div><div id="navnav">Admin Login</div>
      <div id="usernav">Admin User</div> 
	</div>
<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "380px";
  document.getElementById("usernav").style.marginLeft = "-150px";
  document.getElementById("navnav").style.marginLeft = "340px";
  document.getElementById("side").style.marginTop = "240px";
  document.getElementById("header").style.marginTop = "240px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("usernav").style.marginLeft = "0px";
  document.getElementById("navnav").style.marginLeft = "20px";

}
</script>
</body>
</html>
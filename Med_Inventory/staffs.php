<!DOCTYPE html>
<html>
<head>
<title>Staffs</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

/* Style the body */
body {
  font-family: Arial;
  margin: 0;
}

/* Header/logo Title */
.header {
  padding: 20px;
  text-align: left;
  background: #ADD8E6;
  color: white;
}

/* Style the top navigation bar */
.navbar {
  display: flex;
  background-color: #333;
}

/* Style the navigation bar links */
.navbar a {
  color: white;
  padding: 14px 20px;
  text-decoration: none;
  text-align: center;
  font-size: 20px
}

/* Change color on hover */
.navbar a:hover {
  background-color: #ddd;
  color: black;
  text-decoration: none;
}

a#active {
  color: black;
  background-color: #ddd;
}
/* Column container */
.row {  
  display: flex;
  flex-wrap: wrap;
}

/* Create two unequal columns that sits next to each other */
/* Sidebar/left column */
.side {
  flex: 10%;
  background-color: #f1f1f1;
  padding: 20px;
}

/* Main column */
.main {
  flex: 70%;
  background-color: white;
  padding: 20px;
}

/* Fake image, just for this example */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Footer */
.footer {
  padding: 10px;
  text-align: right;
  background: #ADD8E6;
  font-size: 10px
}
table{
  border-collapse: collapse;
  width: 80%;
  text-align: center;
  background-color: #CDEEFD;
  font-size: 20px;
  font-family: monospace;
  font-weight: bold;

}

th{
  background-color: #89CFF0;
}
td{
  padding: 20px;
}
tr:nth-child(odd){
  background-color: #AFDCEB;
}
#access{
  text-align: right;
  color: red;
}

button{
  background-color: #AFDCEB;
  width: 15%;
  height: 9%;
  font-size: 15px;
  font-weight: bold;
  font-family: monospace;
  margin-top: 100px;
  padding: 10px;
  border-style: none;
}

/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 700px) {
  .row, .navbar {   
    flex-direction: column;
  }
}
</style>
</head>
<body>

<!-- Note -->

<!-- Header -->
<div class="header">
  <h1>Medicine Management</h1>
  <h1 id="access">ADMIN</h1>
</div>
<!-- Navigation Bar -->
<div class="navbar">
  <a href="aaaa.html">Home</a>
  <a href="#" id="active">Staffs</a>
  <a href="#">Medicines</a>
</div>
<table>
<div>
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Login Last:</th>
    <th>Logout Last:</th>
  </tr>
</div>
 <?php
include("config.php");

$sql = "SELECT FIRSTNAME, LASTNAME, LOGIN, LOGOUT FROM staff_account";
$result = $variable-> query($sql);

if($result -> num_rows > 0){
  while ($row = $result -> fetch_assoc()) {
    echo "<tr><td>" . $row["FIRSTNAME"] ."</td><td>" . $row["LASTNAME"] ."</td><td>" . $row["LOGIN"] . "</td><td>" . $row["LOGOUT"]. "</td></tr>";
  }
  echo "</table>";
}
else{
  echo "0 result";
}
?>

<div>
  <button onclick="window.location.href='register.php';">
      Register a Staff Member
    </button>
</div>
</body>
</html>
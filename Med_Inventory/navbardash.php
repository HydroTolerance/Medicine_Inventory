

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
  #main1 {
  transition: margin-left .5s;
  padding: 0px;
}
.dropdown {
  float: right;
}
.dropdown .dropbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: black;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit; 
  margin: 0; 
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 200px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  right: 10px;
}
.dropdown-content a {
  float: none;
  color: black;
  padding: 14px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}
.dropdown:hover .dropdown-content {
  display: block;
} 

.circle-red {
  position: absolute;
  height: 30px;
  width: 30px;
  background-color: red;
  color: white;
  border-radius: 50%;
  text-align: center;

}
.design{
  flex: 70%;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
</style>
<body>
<div id="navbar" style="width: 100%; background-color: white; padding-top:10px; padding-bottom: 30px;">
	<div id="main1">  
      <div class="design">
        <label style="color:rgb(52, 147, 215); font-size: 30px; margin-top: 20px; margin-left:30px;">Hello Staff!</label>
        <div class="end">
          <div class="dropdown">
            <div class="circle-red">
              <h4 style="margin-top: 4px;">
            <?php $result = mysqli_query($variable, "SELECT COUNT(medicine) FROM medicines WHERE expirydate BETWEEN CURDATE() and DATE_ADD(CURDATE(), INTERVAL 30 DAY)");while($rows = mysqli_fetch_array($result)){?><?php echo $rows['COUNT(medicine)'];}?>
            </h4>
            </div>
            <button class="dropbtn"><span class="material-symbols-outlined" style="font-size: 40px;">notifications</span>
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <?php $result = mysqli_query($variable, "SELECT medicine FROM medicines WHERE expirydate BETWEEN CURDATE() and DATE_ADD(CURDATE(), INTERVAL 30 DAY)");
                while($rows = mysqli_fetch_array($result)){?>
                <table style="padding: 20px;"> 
                    <tr>
                        <td><?php echo "Your product will be Expired soon Name: " . $rows['medicine']?>  </td>
                    </tr>
                    
                <?php
              } ?></td>
                  </tr>
                </table>
                
            
        </div>
              <a href="notes1.php"><span class="material-symbols-outlined" style="font-size: 40px; margin-top: 15px; margin-right:25px; color:#000;">assignment_add</span></a>
        </div>
      </div>

</div>
</body>
</html>
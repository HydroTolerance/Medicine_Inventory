<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="navbar" style="width: 100%; background-color: white;">
		<div id="main1">  
		</div>
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
</body>
</html>
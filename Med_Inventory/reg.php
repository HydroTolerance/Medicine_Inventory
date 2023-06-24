 <?php
include("config.php");
$USERNAME=$_POST['USERNAME'];
$PASSWORD=$_POST['PASSWORD'];
$FIRSTNAME=$_POST['FIRSTNAME'];
$LASTNAME=$_POST['LASTNAME'];
$sql="insert into staff_account(USERNAME, PASSWORD, FIRSTNAME, LASTNAME) values ('$USERNAME', '$PASSWORD', '$FIRSTNAME', '$LASTNAME');";
$result1=mysqli_query($variable,$sql);
header("location:login.php")
?>
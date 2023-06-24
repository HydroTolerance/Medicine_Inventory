 <?php
include("config.php");
$FIRSTNAME=$_POST['FIRSTNAME'];
$LASTNAME=$_POST['LASTNAME'];
$NOTE=$_POST['NOTE'];
$sql="insert into notes(FIRSTNAME, LASTNAME, NOTE) values ('$FIRSTNAME', '$LASTNAME', '$NOTE');";
$result1=mysqli_query($variable,$sql);
header("location:notes1.php")
?>  
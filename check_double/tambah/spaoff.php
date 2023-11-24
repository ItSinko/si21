<?php  
//check.php  
$connect = mysqli_connect("localhost", "root", "", "kontrol_db"); 
if(isset($_POST["idorderoff"]))
{
 
 $idorderoff = mysqli_real_escape_string($connect, $_POST["idorderoff"]);
 
 $query = "SELECT * FROM spa_off WHERE idorder_off = ".$idorderoff."";
 $result = mysqli_query($connect, $query);
 echo mysqli_num_rows($result);

 }
?>
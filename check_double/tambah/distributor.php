<?php  
//check.php  
$connect = mysqli_connect("localhost", "root", "", "kontrol_db"); 
if(isset($_POST["iddsb"]))
{
 
 $iddsb = mysqli_real_escape_string($connect, $_POST["iddsb"]);
 $query = "SELECT * FROM distributor WHERE iddsb = '".$iddsb."'";
 $result = mysqli_query($connect, $query);
 echo mysqli_num_rows($result);

 }
?>
<?php  
//check.php  
$connect = mysqli_connect("localhost", "root", "", "kontrol_db"); 
if(isset($_POST["noref"]))
{
 
 $noref = mysqli_real_escape_string($connect, $_POST["noref"]);
 $query = "SELECT * FROM efaktur WHERE noref = '".$noref."'";
 $result = mysqli_query($connect, $query);
 echo mysqli_num_rows($result);

 }
?>
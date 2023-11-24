<?php  

$connect = mysqli_connect("localhost", "root", "", "kontrol_db"); 
if(isset($_POST["idorder_sb"]))
{
 
 $idorder_sb = mysqli_real_escape_string($connect, $_POST["idorder_sb"]);
 $query = "SELECT * FROM admjual_off WHERE idorderadm_off = '".$idorder_sb."'";
 $result = mysqli_query($connect, $query);
 echo mysqli_num_rows($result);

 }
 
?>
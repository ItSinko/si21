<?php  
require '../../koneksi.php';

 
if(isset($_POST["idorder_sb"]))
{
 
 $idorder_sb = mysqli_real_escape_string($con, $_POST["idorder_sb"]);
 $query = "SELECT * FROM admjual_off WHERE idorderadm_off = '".$idorder_sb."'";
 $result = mysqli_query($con, $query);
 echo mysqli_num_rows($result);

 }
 
?>
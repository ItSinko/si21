<?php  
require '../../koneksi.php';


if(isset($_POST["noseri"]))
{
 
 $noseri = mysqli_real_escape_string($con, $_POST["noseri"]);
 $query = "SELECT * FROM seri_off WHERE noseri_off = '$noseri'";
 $result = mysqli_query($con, $query);
 echo mysqli_num_rows($result);

 }
?>
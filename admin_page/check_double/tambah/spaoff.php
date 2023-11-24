<?php  
require '../../koneksi.php';


if(isset($_POST["idorderoff"]))
{
 
 $idorderoff = mysqli_real_escape_string($con, $_POST["idorderoff"]);
 
 $query = "SELECT * FROM spa_off WHERE idorder_off = '$idorderoff'";
 $result = mysqli_query($con, $query);
 echo mysqli_num_rows($result);

 }
?>
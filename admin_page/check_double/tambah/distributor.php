<?php  
require '../../koneksi.php';


if(isset($_POST["iddsb"]))
{
 
 $iddsb = mysqli_real_escape_string($con, $_POST["iddsb"]);
 $query = "SELECT * FROM distributor WHERE iddsb = '".$iddsb."'";
 $result = mysqli_query($con, $query);
 echo mysqli_num_rows($result);

 }
?>
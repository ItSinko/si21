<?php  
require '../../koneksi.php';


if(isset($_POST["noref"]))
{
 
 $noref = mysqli_real_escape_string($con, $_POST["noref"]);
 $query = "SELECT * FROM efaktur WHERE noref = '".$noref."'";
 $result = mysqli_query($con, $query);
 echo mysqli_num_rows($result);

 }
?>
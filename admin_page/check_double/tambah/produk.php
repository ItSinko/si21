<?php  
require '../../koneksi.php';


if(isset($_POST["type"]))
{
 
 $type = mysqli_real_escape_string($con, $_POST["type"]);
 $query = "SELECT * FROM produk_master WHERE sing_prod = '".$type."'";
 $result = mysqli_query($con, $query);
 echo mysqli_num_rows($result);

 }
 
?>
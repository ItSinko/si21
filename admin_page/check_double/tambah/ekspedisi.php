<?php  
require '../../koneksi.php';


if(isset($_POST["ekspedisi"]))
{
 
 $ekspedisi = mysqli_real_escape_string($con, $_POST["ekspedisi"]);
 $query = "SELECT * FROM jasaeks WHERE nama_eks = '".$ekspedisi."'";
 $result = mysqli_query($con, $query);
 echo mysqli_num_rows($result);

 }
?>
<?php 
require '../../koneksi.php';

$idorder = $_POST['idorder'];
$keteks_off = $_POST['keteks_off'];
 
$update =   "UPDATE ekspedisi_off SET 
			keteks_off = '$keteks_off' WHERE idordereks_off = '$idorder' ";
		  
$result	= mysqli_query($con, $update);

print "Data Berhasil Di Update!"; 



?>




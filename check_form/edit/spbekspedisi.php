<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");

$nomorekspedisi_spb = $_POST['nomorekspedisi_spb'];
$keteks_spb = $_POST['keteks_spb'];
 
$update =   "UPDATE ekspedisi_spb SET 
			keteks_spb = '$keteks_spb' WHERE noeks_spb = '$nomorekspedisi_spb' ";
		  
$result	= mysqli_query($con, $update);

print "Data Berhasil Di Update!"; 



?>




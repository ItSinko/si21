<?php 
require '../../koneksi.php';


$nolkpp = $_POST['nolkpp'];
$ket = $_POST['ket'];
$idprod_on = $_POST['idprod_on'];
$pabrik_on = $_POST['pabrik_on'];

	
	
$update=  "UPDATE ekspedisi_on  SET 
								  
								   keteks_on='$ket',
								   pabrikeks_on='$pabrik_on',
								   idprodeks_on='$idprod_on'
				   
								   WHERE nolkppeks_on= '$nolkpp'";
		  
$result	= mysqli_query($con, $update);
	
	

print "Data Berhasil Di Update!"; 

?>

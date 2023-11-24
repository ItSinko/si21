<?php 
require '../../koneksi.php';

$nomorekspedisi_spb = $_POST['nomorekspedisi_spb'];
$keteks_spb = $_POST['keteks_spb'];
$idprodeks_spb = $_POST['idprodeks_spb'];

 
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * from ekspedisi_spb WHERE  noeks_spb='$nomorekspedisi_spb' "));
if ($cek > 0 ) {
	
		
print "Maaf,  No Order Sudah Pernah di Input !!"; 
		
}
 
 
 else {

mysqli_query($con, "INSERT INTO ekspedisi_spb VALUES('$nomorekspedisi_spb','$keteks_spb','$idprodeks_spb') ");
	
print "Data Berhasil Di input!"; 


 }
?>






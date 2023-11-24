<?php 
require '../../koneksi.php';

$nomorqc_spb = $_POST['nomorqc_spb'];
$tglterimaqc_spb = $_POST['tglterimaqc_spb'];
$tglserahqc_spb = $_POST['tglserahqc_spb'];
$ketqc_spb = $_POST['ketqc_spb'];
$idprodqc_spb = $_POST['idprodqc_spb'];


 
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * from qc_spb WHERE noqc_spb='$nomorqc_spb' "));
if ($cek > 0 ) {
	
		
print "Maaf, No Order Sudah Pernah di Input !!"; 
		
}
 
 else {
mysqli_query($con, "INSERT INTO qc_spb VALUES('$nomorqc_spb','$tglterimaqc_spb','$tglserahqc_spb','$ketqc_spb','$idprodqc_spb') ");	
print "Data Berhasil Di input!"; 
 }
?>
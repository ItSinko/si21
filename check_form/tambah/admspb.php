<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");

$nomorspb = $_POST['nomorspb'];
$telp_spb = $_POST['telp_spb'];
$sms_spb = $_POST['sms_spb'];
$nopo_spb = $_POST['nopo_spb'];
$tglpo_spb = $_POST['tglpo_spb'];
$nodo_spb = $_POST['nodo_spb'];
$tgldo_spb = $_POST['tgldo_spb'];
$ket_admspb = $_POST['ket_admspb'];
$idprodadm_spb = $_POST['idprodadm_spb'];

 
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * from admjual_spb WHERE noadm_spb='$nomorspb' "));
if ($cek > 0 ) {
	
		
print "Maaf, No Order Sudah Pernah di Input !!"; 
		
}
 
else {  
mysqli_query($con, "INSERT INTO admjual_spb VALUES('$nomorspb','$telp_spb','$sms_spb','$nopo_spb','$tglpo_spb','$nodo_spb','$tgldo_spb','$ket_admspb','$idprodadm_spb') ");
print "Data Berhasil Di input!"; 
 }
?>
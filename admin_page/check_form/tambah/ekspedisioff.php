<?php 
require '../../koneksi.php';


$idorder = $_POST['idorder'];
$keteks_off = $_POST['keteks_off'];
$idprodeks_off = $_POST['idprodeks_off'];
$pabrikeks_off = $_POST['pabrikeks_off'];


 
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * from ekspedisi_off WHERE idordereks_off='$idorder' "));
if ($cek > 0 ) {
	
		
print "Maaf, ID Order Sudah Pernah di Input !!"; 
		
}
 
 
 else {
 
 
 
 
 
 
 
 
 
 
mysqli_query($con, "INSERT INTO ekspedisi_off VALUES('$idorder','$keteks_off','$pabrikeks_off','$idprodeks_off') ");
	
print "Data Berhasil Di input!"; 


 }
?>






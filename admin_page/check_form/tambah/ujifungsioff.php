<?php 
require '../../koneksi.php';

$idorder = $_POST['idorder'];
$invuji_off = $_POST['invuji_off'];
$tgluji_off = $_POST['tgluji_off'];
$tarifuji_off = $_POST['tarifuji_off'];
$tglbayaruji_off = $_POST['tglbayaruji_off'];
$kasuji_off	 = $_POST['kasuji_off'];
$ketuji_off = $_POST['ketuji_off'];
$distributoruji_off = $_POST['distributoruji_off'];
$idprodukuji_off = $_POST['idprodukuji_off'];


 
 
 
 
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * from piutang_off WHERE  idorderuji_off='$idorder' "));
if ($cek > 0 ) {
	
		
print "Maaf, ID Order Sudah Pernah di Input !!"; 
		
}
 
 
 else {
 
 
 
 
 
 
 
 
 
 
mysqli_query($con, "INSERT INTO piutang_off VALUES('$idorder','$invuji_off','$tgluji_off','$tarifuji_off','$tglbayaruji_off','$kasuji_off',
											  '$ketuji_off','$distributoruji_off','$idprodukuji_off') ");
	
print "Data Berhasil Di input!"; 


 }
?>






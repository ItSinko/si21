<?php 
require '../../koneksi.php';

$nomorspb = $_POST['nomorspb'];
$pelanggan_spb = $_POST['pelanggan_spb'];
$untuk_spb = $_POST['untuk_spb'];
$jumlah_spb = $_POST['jumlah_spb'];

$ket_spb = $_POST['ket_spb'];
$idproduk_spb = $_POST['idproduk_spb'];

//pemotongan harga
	$harga = $_POST['harga'];
	$potongharga = substr ($harga,3);
	$hrg = str_replace('.', '', $potongharga);
	

$cek = mysqli_num_rows(mysqli_query($con,"SELECT * from spb WHERE nospb='$nomorspb' "));
if ($cek > 0 ) {
	
		
print "Maaf, No Order Sudah Pernah di Input !!"; 
		
}
 
 
 else {
 
 
mysqli_query($con, "INSERT INTO spb VALUES('$nomorspb','$pelanggan_spb','$untuk_spb','$jumlah_spb',$hrg,'$ket_spb',$idproduk_spb) ");
	
print "Data Berhasil Di input!"; 


 }
?>






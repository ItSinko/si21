<?php 
require '../../koneksi.php';


$ideks_spb = $_POST['ideks_spb'];
$idorder = $_POST['idorder'];
$tglreal = $_POST['tglreal'];
$dikirim = $_POST['dikirim'];
$noresi = $_POST['noresi'];
$ket = $_POST['ket'];
	
 //proses harga
 $nilai = $_REQUEST["nilai"];
 $potongnilai= substr ($nilai,3);
 $nilai_kirim = str_replace('.', '', $potongnilai);


$jasafk_on = $_POST['jasafk_on'];

$update=  "UPDATE ekspedisi2_spb SET noeksfk_spb='$idorder',tglkirim_spb='$tglreal',jumlaheks_spb='$dikirim',noresi_spb='$noresi',nilai_spb='$nilai_kirim',jasafk_spb='$jasafk_on',keteks2_spb='$ket' WHERE ideks_spb= '$ideks_spb'";
		  		  
$result	= mysqli_query($con, $update);

print "Data Berhasil Di Update!"; 

?>














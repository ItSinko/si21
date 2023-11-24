<?php 
require '../../koneksi.php';


$idorder = $_POST['idorder'];
$tglreal = $_POST['tglreal'];
$dikirim = $_POST['dikirim'];
$noresi = $_POST['noresi'];
$ket = $_POST['ket'];
$jasafk_on = $_POST['jasafk_on'];

	//proses harga
	$nilai = $_REQUEST["nilai"];
	$potongnilai= substr ($nilai,3);
	$nilai_kirim = str_replace('.', '', $potongnilai);


mysqli_query($con, "INSERT INTO ekspedisi2_spb VALUES('','$idorder','$tglreal','$dikirim','$noresi','$nilai_kirim','$jasafk_on','$ket') ");
print "Data Berhasil Di input!"; 

?>






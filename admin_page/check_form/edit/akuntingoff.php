<?php 
require '../../koneksi.php';


$idorder = $_POST['idorder'];
$noref_off = $_POST['noref_off'];
$noefak_off = $_POST['noefak_off'];
$tarifdiskon = $_POST['tarifdiskon'];
$realisasiacc = $_POST['realisasiacc'];
$term = $_POST['term'];
$ket = $_POST['ket'];
$kas = $_POST['kas'];
$idprodacc_off = $_POST['idprodacc_off'];
$pabrikacc_off = $_POST['pabrikacc_off'];
$nosjgdg = $_POST['nosjgdg'];
$ket_log = $_POST['ket_log'];
		
$update=  "UPDATE acc_off  SET diskonacc_off='$tarifdiskon',
							   kas_off='$kas',
							   ketaccoff='$ket' 
							   WHERE idorderacc_off= '$idorder'";


	//USER LOG
$user_aksi = $_POST['username'];
$tgl_aksi  = date("Y-m-d");
ini_set('date.timezone', 'Asia/Jakarta');
$jam_aksi  =  date('H:i:s');


$get_log = "INSERT INTO userlog VALUES('','OFF-$idorder','$user_aksi','Ubah','Akunting (Offline)','$tgl_aksi','$jam_aksi','$ket_log')";	

//LOG
$user_log	= mysqli_query($con, $get_log);	
	

	
		  
$result	= mysqli_query($con, $update);
print "Data Berhasil Di Update!"; 

?>


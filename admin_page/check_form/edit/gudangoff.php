<?php 
require '../../koneksi.php';


$idorder = $_POST['idorder'];
$nosj_off = $_POST['nosj_off'];
$tglsj_off = $_POST['tglsj_off'];
$pabrikgdg_off = $_POST['pabrikgdg_off'];
$idprodgdg_off = $_POST['idprodgdg_off'];
$ketgdg_off = $_POST['ketgdg_off'];
$ket_log = $_POST['ket_log'];

$update =   "UPDATE gudang_off SET 
			nosj_off = '$nosj_off',
			tglsj_off = '$tglsj_off',
			ketgdg_off = '$ketgdg_off' WHERE idordergdg_off = '$idorder' ";	  



	//USER LOG
$user_aksi = $_POST['username'];
$tgl_aksi  = date("Y-m-d");
ini_set('date.timezone', 'Asia/Jakarta');
$jam_aksi  =  date('H:i:s');

$get_log = "INSERT INTO userlog VALUES('','OFF-$idorder','$user_aksi','Ubah','Logistik (Offline)','$tgl_aksi','$jam_aksi','$ket_log')";	

//LOG
$user_log	= mysqli_query($con, $get_log);	


$result	= mysqli_query($con, $update);	


print "Data Berhasil Di Update!"; 


?>


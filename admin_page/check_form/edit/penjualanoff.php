<?php 
require '../../koneksi.php';


$idorder = $_POST['idorder'];
$nopo_off = $_POST['nopo_off'];
$tglpo_off = $_POST['tglpo_off'];
$nodo_off = $_POST['nodo_off'];
$tgldo_off = $_POST['tgldo_off'];
$ketadm_off = $_POST['ketadm_off'];
$ket_log = $_POST['ket_log'];
 
$update =   "UPDATE admjual_off SET 
			nopo_off = '$nopo_off',
			tglpo_off = '$tglpo_off',
			nodo_off = '$nodo_off',
			tgldo_off = '$tgldo_off',
			ketadm_off = '$ketadm_off' WHERE idorderadm_off = '$idorder' ";
		  
$result	= mysqli_query($con, $update);







	//USER LOG
$user_aksi = $_POST['username'];
$tgl_aksi  = date("Y-m-d");
ini_set('date.timezone', 'Asia/Jakarta');
$jam_aksi  =  date('H:i:s');


$get_log = "INSERT INTO userlog VALUES('','ID OFF-$idorder','$user_aksi','Ubah','Adm Jual (Offline)','$tgl_aksi','$jam_aksi','$ket_log')";	



$log= mysqli_query($con, $get_log);

print "Data Berhasil Di Update!"; 
	
?>




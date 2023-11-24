<?php 
require '../../koneksi.php';


$idorder = $_POST['idorder'];
$tglterima_off = $_POST['tglterima_off'];
$tglserah_off = $_POST['tglserah_off'];
$ketqc_off = $_POST['ketqc_off'];
$ket_log = $_POST['ket_log'];
 
$update =   "UPDATE qc_off SET 
			tglterima_off = '$tglterima_off',
			tglserah_off = '$tglserah_off',
			ketqc_off = '$ketqc_off' WHERE idorderqc_off = '$idorder' ";
		  
$result	= mysqli_query($con, $update);



	//USER LOG
$user_aksi = $_POST['username'];
$tgl_aksi  = date("Y-m-d");
ini_set('date.timezone', 'Asia/Jakarta');
$jam_aksi  =  date('H:i:s');


$get_log = "INSERT INTO userlog VALUES('','ID OFF-$idorder','$user_aksi','Ubah','QC (Offline)','$tgl_aksi','$jam_aksi','$ket_log')";	


$log= mysqli_query($con, $get_log);



print "Data Berhasil Di Update!"; 



?>




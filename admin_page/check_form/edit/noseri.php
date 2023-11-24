<?php 
require '../../koneksi.php';


$idseri = $_POST['idseri'];
$noseri = $_POST['noseri'];
$lkppfk = $_POST['lkppfk'];
$ket_log = $_POST['ket_log'];

$update =   "UPDATE seri_on SET 
			noseri_on = '$noseri',
			lkppfk_on = '$lkppfk'
			 WHERE idseri_on = '$idseri' ";
		
$result	= mysqli_query($con, $update);




	//USER LOG
$user_aksi = $_POST['username'];
$tgl_aksi  = date("Y-m-d");
ini_set('date.timezone', 'Asia/Jakarta');
$jam_aksi  =  date('H:i:s');


$get_log = "INSERT INTO userlog VALUES('','$noseri','$user_aksi','Ubah','Nomer Seri (Online)','$tgl_aksi','$jam_aksi','$ket_log')";	

	

//LOG
$user_log	= mysqli_query($con, $get_log);	


print "Data Berhasil Di Update!";
 
?>
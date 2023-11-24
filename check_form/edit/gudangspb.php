<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");

$nomorgudang_spb = $_POST['nomorgudang_spb'];
$nosjgdg_spb = $_POST['nosjgdg_spb'];
$tglsjgdg_spb = $_POST['tglsjgdg_spb'];
$ketgdg_spb = $_POST['ketgdg_spb'];
$ket_log = $_POST['ket_log'];
 
$update =   "UPDATE gudang_spb SET 
			nosjgdg_spb = '$nosjgdg_spb',
			tglsjgdg_spb = '$tglsjgdg_spb',
			ketgdg_spb = '$ketgdg_spb' WHERE nogdg_spb = '$nomorgudang_spb' ";
		  




		
		  //USER LOG
$user_aksi = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$tgl_aksi  = date("Y-m-d");
ini_set('date.timezone', 'Asia/Jakarta');
$jam_aksi  =  date('H:i:s');


$get_log = "INSERT INTO userlog VALUES('','$nomorgudang_spb','$user_aksi','Ubah','Logistik (SPB)','$tgl_aksi','$jam_aksi','$ket_log')";	

//LOG
$user_log	= mysqli_query($con, $get_log);	

$result	= mysqli_query($con, $update);

print "Data Berhasil Di Update!"; 



?>




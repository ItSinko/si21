<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");

$idorder = $_POST['idorder'];
$invuji_off = $_POST['invuji_off'];
$tgluji_off = $_POST['tgluji_off'];
$tarifuji_off = $_POST['tarifuji_off'];
$tglbayaruji_off = $_POST['tglbayaruji_off'];
$kasuji_off = $_POST['kasuji_off'];
$ketuji_off = $_POST['ketuji_off'];
$ket_log = $_POST['ket_log'];
 
$update =   "UPDATE piutang_off SET 
			invuji_off = '$invuji_off',
			tgluji_off = '$tgluji_off',
			tarifuji_off = '$tarifuji_off',
			tglbayaruji_off = '$tglbayaruji_off',
			kasuji_off = '$kasuji_off',
			ketuji_off = '$ketuji_off' WHERE idorderuji_off = '$idorder' ";
		  
		  
		  
		  //USER LOG
$user_aksi = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$tgl_aksi  = date("Y-m-d");
ini_set('date.timezone', 'Asia/Jakarta');
$jam_aksi  =  date('H:i:s');


$get_log = "INSERT INTO userlog VALUES('','OFF-$idorder','$user_aksi','Ubah','Piutang (Offline)','$tgl_aksi','$jam_aksi','$ket_log')";	

//LOG
$user_log	= mysqli_query($con, $get_log);	
	

	
	
$result	= mysqli_query($con, $update);

print "Data Berhasil Di Update!"; 



?>




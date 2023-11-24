<?php 
require '../../koneksi.php';


$nolkpp = $_POST['nolkpp'];
$invuji = $_POST['invuji'];
$tgluji = $_POST['tgluji'];
$tarifuji = $_POST['tarifuji'];
$tglbayar = $_POST['tglbayar'];
$ketuji = $_POST['ketuji'];
$iddsb = $_POST['iddsb'];
$id_prod = $_POST['id_prod'];
$kasuji = $_POST['kasuji'];
$ket_log = $_POST['ket_log'];

$update =   "UPDATE piutang_on SET 
			invuji_on = '$invuji',
			tgluji_on = '$tgluji',
			tarifuji_on = '$tarifuji',
			tglbayaruji_on = '$tglbayar',
			kasuji_on = '$kasuji', 
			ketuji_on = '$ketuji', 
			idpabrikuji_on = '$iddsb', 
			idproduji_on = '$id_prod'
			
			WHERE nolkppuji_on = '$nolkpp' ";
		
$result	= mysqli_query($con, $update);




	//USER LOG
$user_aksi = $_POST['username'];
$tgl_aksi  = date("Y-m-d");
ini_set('date.timezone', 'Asia/Jakarta');
$jam_aksi  =  date('H:i:s');


$get_log = "INSERT INTO userlog VALUES('','LKPP $nolkpp','$user_aksi','Ubah','Piutang (Online)','$tgl_aksi','$jam_aksi','$ket_log')";	


//LOG
$user_log	= mysqli_query($con, $get_log);	

print "Data Berhasil Di Update!"; 

?>




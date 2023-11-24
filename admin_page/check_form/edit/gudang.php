<?php 
require '../../koneksi.php';


$nolkpp = $_POST['nolkpp'];
$nosj = $_POST['nosj'];
$tglsj = $_POST['tglsj'];
$pabrik_on = $_POST['pabrik_on'];
$idprod_on = $_POST['idprod_on'];
$ket = $_POST['ket'];
$ket_log = $_POST['ket_log'];

$update=  "UPDATE gudang_on SET nosj_on='$nosj',tglsj_on='$tglsj',ketgdg_on='$ket',pabrikgdg_on='$pabrik_on',idprodgdg_on='$idprod_on' WHERE nolkppgdg_on= '$nolkpp'";		  
$result	= mysqli_query($con, $update);	



	//USER LOG
$user_aksi = $_POST['username'];
$tgl_aksi  = date("Y-m-d");
ini_set('date.timezone', 'Asia/Jakarta');
$jam_aksi  =  date('H:i:s');


$get_log = "INSERT INTO userlog VALUES('','LKPP $nolkpp','$user_aksi','Ubah','Logistik (Online)','$tgl_aksi','$jam_aksi','$ket_log')";	

	

//LOG
$user_log	= mysqli_query($con, $get_log);	











print "Data Berhasil Di Update!"; 


?>


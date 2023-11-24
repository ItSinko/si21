<?php 
require '../../koneksi.php';


$nolkpp = $_POST['nolkpp'];
$noref = $_POST['noref'];
$efaktur = $_POST['efaktur'];
$tarif = $_POST['tarif'];
$term = $_POST['term'];
$kas = $_POST['kas'];
$ket = $_POST['ket'];
$idprod_on = $_POST['idprod_on'];
$pabrik_on = $_POST['pabrik_on'];
$diskonuji = $_POST['diskonuji'];
$nosjgdg = $_POST['nosjgdg'];
$ket_log = $_POST['ket_log'];
		

$update=  "UPDATE acc_on  SET diskonacc_on='$tarif',
							kas_on='$kas',ketaccon='$ket' 
							WHERE nolkppacc_on= '$nolkpp'";
		  
$result	= mysqli_query($con, $update);


	//USER LOG
$user_aksi = $_POST['username'];
$tgl_aksi  = date("Y-m-d");
ini_set('date.timezone', 'Asia/Jakarta');
$jam_aksi  =  date('H:i:s');


$get_log = "INSERT INTO userlog VALUES('','LKPP $nolkpp','$user_aksi','Ubah','Akunting (Online)','$tgl_aksi','$jam_aksi','$ket_log')";	

	

//LOG
$user_log	= mysqli_query($con, $get_log);	






print "Data Berhasil Di Update!"; 

?>

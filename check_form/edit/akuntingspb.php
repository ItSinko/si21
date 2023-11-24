<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");

$idorder = $_POST['idorder'];
$tgllunas = $_POST['tgllunas'];
$kas = $_POST['kas'];
$ket = $_POST['ket'];
$idprod = $_POST['idprod'];
$ket_log = $_POST['ket_log'];


//potong harga
	$diskonfp = $_POST['diskonfp'];
	$potongdiskonacc = substr ($diskonfp,3);
	$disfp = str_replace('.', '', $potongdiskonacc);
	


$update=  "UPDATE acc_spb  SET diskonfp_spb='$disfp',tgllunas_spb='$tgllunas',
							kasacc_spb='$kas',ketacc_spb='$ket',idprodacc_spb='$idprod' 
							WHERE noacc_spb= '$idorder'";
		  
		  
		  
		
		  //USER LOG
$user_aksi = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$tgl_aksi  = date("Y-m-d");
ini_set('date.timezone', 'Asia/Jakarta');
$jam_aksi  =  date('H:i:s');


$get_log = "INSERT INTO userlog VALUES('','$idorder','$user_aksi','Ubah','Akunting (SPB)','$tgl_aksi','$jam_aksi','$ket_log')";	

//LOG
$user_log	= mysqli_query($con, $get_log);	


$result	= mysqli_query($con, $update);
	
print "Data Berhasil Di Update!"; 

?>

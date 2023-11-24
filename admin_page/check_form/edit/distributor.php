<?php 
require '../../koneksi.php';


$iddsb = $_POST['iddsb'];
$distributor = $_POST['distributor'];
$alamat_email = $_POST['alamat_email'];
$alamat = $_POST['alamat'];
$temp = $_POST['temp'];
$diskonnota = $_POST['diskonnota'];
$diskonuji = $_POST['diskonuji'];
$telepon = $_POST['telepon'];
$ket = $_POST['ket'];
$ket_log = $_POST['ket_log'];


	
	
$update=  "UPDATE distributor SET  pabrik='$distributor', telp_dsb='$telepon',alamat_dsb='$alamat',alamat_email='$alamat_email',diskonnota='$diskonnota',diskonuji='$diskonuji',temphari='$temp',
		  ket_dsb='$ket'		  
		  WHERE iddsb= '$iddsb'";
		  
$result	= mysqli_query($con, $update);
	
	
	
	
	//USER LOG
$user_aksi = $_POST['username'];
$tgl_aksi  = date("Y-m-d");
ini_set('date.timezone', 'Asia/Jakarta');
$jam_aksi  =  date('H:i:s');


$get_log = "INSERT INTO userlog VALUES('','$distributor','$user_aksi','Ubah','Distributor','$tgl_aksi','$jam_aksi','$ket_log')";	
$user_log	= mysqli_query($con, $get_log);	
	
	

print "Data Berhasil Di Update!"; 

?>





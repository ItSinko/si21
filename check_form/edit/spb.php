<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");

$nomorspb = $_POST['nomorspb'];
$pelanggan_spb = $_POST['pelanggan_spb'];
$untuk_spb = $_POST['untuk_spb'];
$jumlah_spb = $_POST['jumlah_spb'];
$harga_spb = $_POST['harga_spb'];
$ket_spb = $_POST['ket_spb'];
$ket_log = $_POST['ket_log'];

//pemotongan harga
$harga = $_REQUEST["harga"];
$potongharga = substr ($harga,3);
$hrg = str_replace('.', '', $potongharga);		
			
 
$update =   "UPDATE spb SET 
			pelanggan_spb = '$pelanggan_spb',
			untuk_spb = '$untuk_spb',
			jumlah_spb = '$jumlah_spb',
			harga_spb = '$hrg',
			ket_spb = '$ket_spb' WHERE nospb = '$nomorspb' ";

  
		  
		  //USER LOG
$user_aksi = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$tgl_aksi  = date("Y-m-d");
ini_set('date.timezone', 'Asia/Jakarta');
$jam_aksi  =  date('H:i:s');


$get_log = "INSERT INTO userlog VALUES('','$nomorspb','$user_aksi','Ubah','SPB','$tgl_aksi','$jam_aksi','$ket_log')";	

//LOG
$user_log	= mysqli_query($con, $get_log);	
			  
$result	= mysqli_query($con, $update);


print "Data Berhasil Di Update!"; 



?>




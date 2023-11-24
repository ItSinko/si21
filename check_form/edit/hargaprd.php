<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");

$id_prod = $_POST['id_prod'];
$type = $_POST['type'];
$nmprd = $_POST['nmprd'];
$merk = $_POST['merk'];
$ket_log = $_POST['ket_log'];

//proses harga
$hargae = $_POST['hargae'];

	$potongharga = substr ($hargae,3);
	$hrg = str_replace('.', '', $potongharga);




//proses harga
$hargadpp = $_POST['hargadpp'];
	$potonghargadpp = substr ($hargadpp,3);
	$hrgdpp = str_replace('.', '', $potonghargadpp);



$ket = $_POST['ket'];
 
$update=  "UPDATE produk_master SET merk = '$merk', sing_prod='$type', nam_prod='$nmprd',harga='$hrg',hargadpp='$hrgdpp',ket='$ket'
		  
		  WHERE id_prod= '$id_prod'";
		  
$result	= mysqli_query($con, $update);
	
	
//USER LOG
$user_aksi = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$tgl_aksi  = date("Y-m-d");
ini_set('date.timezone', 'Asia/Jakarta');
$jam_aksi  =  date('H:i:s');


$get_log = "INSERT INTO userlog VALUES('','$type','$user_aksi','Ubah','Harga Produk','$tgl_aksi','$jam_aksi','$ket_log')";	
$user_log	= mysqli_query($con, $get_log);	
	
	
print "Data Berhasil Di Update!"; 
?>





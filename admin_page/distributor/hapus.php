<?php
require '../../koneksi.php';


$iddsb= $_GET["id"];
$ket_log = $_GET['ket_log'];
$id_log = $_GET['id_log'];



$hapus = "DELETE FROM distributor WHERE iddsb='$iddsb'";



$resultb	= mysqli_query($con, $hapus);
		

	
	//USER LOG
	$user_aksi = $_GET['username'];
	$tgl_aksi  = date("Y-m-d");
	ini_set('date.timezone', 'Asia/Jakarta');
	$jam_aksi  =  date('H:i:s');



	$get_log = "INSERT INTO userlog VALUES('','$id_log','$user_aksi','Hapus','Distributor','$tgl_aksi','$jam_aksi','$ket_log')";	
	$user_log	= mysqli_query($con, $get_log);	

	echo" 
		<script>
			alert('Data berhasil dihapus!');
			document.location.href = '../index.php?hlm=dsb';
		</script>
	";
	
	

	?>
	
	
	
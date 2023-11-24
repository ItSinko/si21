<?php
require '../../koneksi.php';


$noadm_spb= $_GET["noadm_spb"];
$ket_log= $_GET["ket_log"];

$hapus = "DELETE FROM admjual_spb WHERE noadm_spb='$noadm_spb' ";									


	
	//USER LOG
	$user_aksi = $_GET["username"];
	$tgl_aksi  = date("Y-m-d");
	ini_set('date.timezone', 'Asia/Jakarta');
	$jam_aksi  =  date('H:i:s');



	$get_log = "INSERT INTO userlog VALUES('','$noadm_spb','$user_aksi','Hapus','Adm Jual (SPB)','$tgl_aksi','$jam_aksi','$ket_log')";	
	
	$user_log	= mysqli_query($con, $get_log);	
$result	= mysqli_query($con, $hapus);


	
echo" 
	<script>
		alert('data berhasil hapus!');
		document.location.href = '../index.php?hlm=admspb';
	</script>
";

?>
	
	
	
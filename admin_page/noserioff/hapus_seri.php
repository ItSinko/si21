
	
	<?php
require '../../koneksi.php';

	
//$con=mysqli_connect("localhost","root","","kontrol_db");

$idseri_off= $_GET["idseri_off"];
$lkppfk_off= $_GET["lkppfk_off"];
$noseri= $_GET["noseri"];
$ket_log= $_GET["ket_log"];





$hapus = "DELETE FROM seri_off WHERE idseri_off= '$idseri_off'";
$resultb	= mysqli_query($con, $hapus);


//USER LOG
	$user_aksi =  $_GET["username"];
	$tgl_aksi  = date("Y-m-d");
	ini_set('date.timezone', 'Asia/Jakarta');
	$jam_aksi  =  date('H:i:s');
	
	
	$get_log = "INSERT INTO userlog VALUES('','$noseri','$user_aksi','Hapus','Nomer Seri (Offline)','$tgl_aksi','$jam_aksi','$ket_log')";	
	$user_log	= mysqli_query($con, $get_log);	

	
		
	echo" 
		<script>
			alert('data berhasil hapus!');
			document.location.href = '../index.php?hlm=noserioff&aksi=more&idorderadm_off=$lkppfk_off';
		</script>
	";
	

	?>
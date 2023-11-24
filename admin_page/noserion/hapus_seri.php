<?php
require '../../koneksi.php';


$idseri_on= $_GET["idseri_on"];
$lkppfk_on= $_GET["lkppfk_on"];
$noseri= $_GET["noseri"];
$ket_log= $_GET["ket_log"];

$hapus = "DELETE FROM seri_on WHERE idseri_on='$idseri_on'";
$resultb	= mysqli_query($con, $hapus);


//USER LOG
	$user_aksi = $_GET["username"];
	$tgl_aksi  = date("Y-m-d");
	ini_set('date.timezone', 'Asia/Jakarta');
	$jam_aksi  =  date('H:i:s');
	
	
	$get_log = "INSERT INTO userlog VALUES('','$noseri','$user_aksi','Hapus','Nomer Seri (Online)','$tgl_aksi','$jam_aksi','$ket_log')";	
	$user_log	= mysqli_query($con, $get_log);	

	
		
	echo" 
		<script>
			alert('data berhasil hapus!');
			document.location.href = '../index.php?hlm=noserion&aksi=more&nolkppadm_on=$lkppfk_on';
		</script>
	";
	

	?>
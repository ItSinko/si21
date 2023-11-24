<?php
require '../../koneksi.php';


$nolkppqc_on= $_GET["nolkppqc_on"];
$ket_log = $_GET["ket_log"];

$hapus = "DELETE FROM qc_on WHERE nolkppqc_on='$nolkppqc_on'";

$resultb	= mysqli_query($con, $hapus);



//USER LOG
	$user_aksi = $_GET["username"];
	$tgl_aksi  = date("Y-m-d");
	ini_set('date.timezone', 'Asia/Jakarta');
	$jam_aksi  =  date('H:i:s');
	
	
	$get_log = "INSERT INTO userlog VALUES('','LKPP $nolkppqc_on','$user_aksi','Hapus','QC (Online)','$tgl_aksi','$jam_aksi','$ket_log')";	
	$user_log	= mysqli_query($con, $get_log);	

	
		
	echo" 
		<script>
			alert('data berhasil hapus!');
			document.location.href = '../index.php?hlm=qcon';
		</script>
	";
	

	?>
	
	
	
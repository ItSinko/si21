<?php
require '../../koneksi.php';



$noqc_spb= $_GET["noqc_spb"];
$ket_log= $_GET["ket_log"];

$hapus = "DELETE FROM qc_spb WHERE noqc_spb='$noqc_spb'";


		
		
		
	//USER LOG
	$user_aksi = $_GET["username"];
	$tgl_aksi  = date("Y-m-d");
	ini_set('date.timezone', 'Asia/Jakarta');
	$jam_aksi  =  date('H:i:s');



	$get_log = "INSERT INTO userlog VALUES('','$noqc_spb','$user_aksi','Hapus','QC (SPB)','$tgl_aksi','$jam_aksi','$ket_log')";	
	
	
	$resultb	= mysqli_query($con, $hapus);
	
	$user_log	= mysqli_query($con, $get_log);	


	echo" 
		<script>
			alert('data berhasil hapus!');
			document.location.href = '../index.php?hlm=qcspb';
		</script>
	";
	

	?>
	
	
	
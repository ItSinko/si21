<?php
$con=mysqli_connect("localhost","root","","kontrol_db");

$noacc_spb= $_GET["noacc_spb"];
$ket_log = $_GET["ket_log"];

$hapus = "DELETE FROM acc_spb WHERE noacc_spb='$noacc_spb'";




		
	//USER LOG
	$user_aksi = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$tgl_aksi  = date("Y-m-d");
	ini_set('date.timezone', 'Asia/Jakarta');
	$jam_aksi  =  date('H:i:s');



	$get_log = "INSERT INTO userlog VALUES('','$noacc_spb','$user_aksi','Hapus','Akunting (SPB)','$tgl_aksi','$jam_aksi','$ket_log')";	
	
	
    $resultb	= mysqli_query($con, $hapus);
    $result	= mysqli_query($con, $get_log);
		
		
	echo" 
		<script>
			alert('data berhasil hapus!');
			document.location.href = '../index.php?hlm=keuanganspb';
		</script>
	";
	
	

	?>
	
	
	
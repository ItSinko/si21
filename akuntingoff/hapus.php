<?php
$con=mysqli_connect("localhost","root","","kontrol_db");

$idorderacc_off= $_GET["idorderacc_off"];
$ket_log= $_GET["ket_log"];

$hapus = "DELETE FROM acc_off WHERE idorderacc_off='$idorderacc_off'";

$resultb	= mysqli_query($con, $hapus);

	



	//USER LOG
	$user_aksi = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$tgl_aksi  = date("Y-m-d");
	ini_set('date.timezone', 'Asia/Jakarta');
	$jam_aksi  =  date('H:i:s');



	$get_log = "INSERT INTO userlog VALUES('','OFF-$idorderacc_off','$user_aksi','Hapus','Akunting (Offline)','$tgl_aksi','$jam_aksi','$ket_log')";	
	$user_log	= mysqli_query($con, $get_log);	





		
	echo" 
		<script>
			alert('data berhasil hapus!');
			document.location.href = '../index.php?hlm=accoff';
		</script>
	";
	

	?>
	
	

<?php
$con=mysqli_connect("localhost","root","","kontrol_db");

$idorderuji_off= $_GET["idorderuji_off"];
$ket_log= $_GET["ket_log"];

$hapus = "DELETE FROM piutang_off WHERE idorderuji_off='$idorderuji_off'";


		
		
		
		
	//USER LOG
	$user_aksi = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$tgl_aksi  = date("Y-m-d");
	ini_set('date.timezone', 'Asia/Jakarta');
	$jam_aksi  =  date('H:i:s');



	$get_log = "INSERT INTO userlog VALUES('','OFF-$idorderuji_off','$user_aksi','Hapus','Piutang (Offline)','$tgl_aksi','$jam_aksi','$ket_log')";	
	
	$user_log	= mysqli_query($con, $get_log);	

	$resultb	= mysqli_query($con, $hapus);
		




	echo" 
		<script>
			alert('data berhasil hapus!');
			document.location.href = '../index.php?hlm=piuoff';
		</script>
	";
	

	?>
	
	
	
<?php
$con=mysqli_connect("localhost","root","","kontrol_db");

$idorderqc_off= $_GET["idorderqc_off"];
$ket_log= $_GET["ket_log"];

$hapus = "DELETE FROM qc_off WHERE idorderqc_off='$idorderqc_off'";

$resultb	= mysqli_query($con, $hapus);



		//USER LOG
	$user_aksi = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$tgl_aksi  = date("Y-m-d");
	ini_set('date.timezone', 'Asia/Jakarta');
	$jam_aksi  =  date('H:i:s');
	
	$get_log = "INSERT INTO userlog VALUES('','ID OFF-$idorderqc_off','$user_aksi','Hapus','QC (Offline)','$tgl_aksi','$jam_aksi','$ket_log')";	
	
		
	$result	= mysqli_query($con, $get_log);
		
		
		
	echo" 
		<script>
			alert('data berhasil hapus!');
			document.location.href = '../index.php?hlm=qcoff';
		</script>
	";
	

	?>
	
	
	
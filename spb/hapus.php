<?php
$con=mysqli_connect("localhost","root","","kontrol_db");

$nospb= $_GET["nospb"];
$ket_log= $_GET["ket_log"];

							
$hapus = "DELETE FROM spb WHERE nospb='$nospb' ";									
										
	

		
	//USER LOG
	$user_aksi = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$tgl_aksi  = date("Y-m-d");
	ini_set('date.timezone', 'Asia/Jakarta');
	$jam_aksi  =  date('H:i:s');



	$get_log = "INSERT INTO userlog VALUES('','$nospb','$user_aksi','Hapus','SPB','$tgl_aksi','$jam_aksi','$ket_log')";	
	
	$user_log	= mysqli_query($con, $get_log);	

	
	
$result	= mysqli_query($con, $hapus);

	echo" 
		<script>
			alert('Data berhasil dihapus!');
			document.location.href = '../index.php?hlm=spb';
		</script>
	";
	

	?>
	
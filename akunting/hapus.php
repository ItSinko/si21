
	
	<?php
$con=mysqli_connect("localhost","root","","kontrol_db");


$nolkppacc_on= $_GET["nolkppacc_on"];
$ket_log = $_GET["ket_log"];

$hapus = "DELETE FROM acc_on WHERE nolkppacc_on='$nolkppacc_on'";



$result	= mysqli_query($con, $hapus);

	



	
	//USER LOG
	$user_aksi = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$tgl_aksi  = date("Y-m-d");
	ini_set('date.timezone', 'Asia/Jakarta');
	$jam_aksi  =  date('H:i:s');



	$get_log = "INSERT INTO userlog VALUES('','LKPP $nolkppacc_on','$user_aksi','Hapus','Akunting (Online)','$tgl_aksi','$jam_aksi','$ket_log')";	
	$user_log	= mysqli_query($con, $get_log);	

	echo" 
		<script>
			alert('Data berhasil dihapus!');
			document.location.href = '../index.php?hlm=accon';
		</script>
	";
	
	

	?>
	
	
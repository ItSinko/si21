
	
	<?php
$con=mysqli_connect("localhost","root","","kontrol_db");


$nolkppuji_on= $_GET["nolkppuji_on"];
$ket_log = $_GET["ket_log"];

$hapus = "DELETE FROM piutang_on WHERE nolkppuji_on='$nolkppuji_on'";

$resultb	= mysqli_query($con, $hapus);
		

	
	//USER LOG
	$user_aksi = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$tgl_aksi  = date("Y-m-d");
	ini_set('date.timezone', 'Asia/Jakarta');
	$jam_aksi  =  date('H:i:s');



	$get_log = "INSERT INTO userlog VALUES('','LKPP $nolkppuji_on','$user_aksi','Hapus','Piutang (Online)','$tgl_aksi','$jam_aksi','$ket_log')";	
	$user_log	= mysqli_query($con, $get_log);	

	echo" 
		<script>
			alert('Data berhasil dihapus!');
			document.location.href = '../index.php?hlm=piuon';
		</script>
	";
	
	?>
	
	
<?php
$con=mysqli_connect("localhost","root","","kontrol_db");

$idseri_spb= $_GET["idseri_spb"];
$noseri= $_GET["noseri"];
$nogdgfk= $_GET["nogdgfk"];
$ket_log= $_GET["ket_log"];


$hapus = "DELETE  FROM seri_spb WHERE idseri_spb='$idseri_spb'";

$resultb	= mysqli_query($con, $hapus);


//USER LOG
	$user_aksi = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$tgl_aksi  = date("Y-m-d");
	ini_set('date.timezone', 'Asia/Jakarta');
	$jam_aksi  =  date('H:i:s');
	
	
	$get_log = "INSERT INTO userlog VALUES('','$noseri','$user_aksi','Hapus','Nomer Seri (Online)','$tgl_aksi','$jam_aksi','$ket_log')";	
	$user_log	= mysqli_query($con, $get_log);	

	
		
	echo" 
		<script>
			alert('data berhasil hapus!');
			document.location.href = '../index.php?hlm=noserispb&aksi=more&noadm_spb=$nogdgfk';
		</script>
	";
	
	?>


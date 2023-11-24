<?php
require '../../koneksi.php';



$nolkppgdg_on= $_GET["nolkppgdg_on"];
$ket_log = $_GET["ket_log"];


$hapus_b = "DELETE  FROM gudang_on  WHERE nolkppgdg_on='$nolkppgdg_on'";




 mysqli_query($con, $hapus_b);

	



	
	//USER LOG
	$user_aksi = $_GET["username"];
	$tgl_aksi  = date("Y-m-d");
	ini_set('date.timezone', 'Asia/Jakarta');
	$jam_aksi  =  date('H:i:s');



	$get_log = "INSERT INTO userlog VALUES('','LKPP $nolkppgdg_on','$user_aksi','Hapus','Logitik (Online)','$tgl_aksi','$jam_aksi','$ket_log')";	
	$user_log	= mysqli_query($con, $get_log);	

	echo" 
		<script>
			alert('Data berhasil dihapus!');
			document.location.href = '../index.php?hlm=gudangon';
		</script>
	";
	
	

	?>
	
	
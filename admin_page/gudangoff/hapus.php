	
	<?php
require '../../koneksi.php';


$idordergdg_off= $_GET["idordergdg_off"];
$ket_log = $_GET["ket_log"];


$hapus_b = "DELETE  FROM gudang_off  WHERE idordergdg_off='$idordergdg_off'";




 mysqli_query($con, $hapus_b);

	



	
	//USER LOG
	$user_aksi = $_GET["username"];
	$tgl_aksi  = date("Y-m-d");
	ini_set('date.timezone', 'Asia/Jakarta');
	$jam_aksi  =  date('H:i:s');



	$get_log = "INSERT INTO userlog VALUES('','OFF-$idordergdg_off','$user_aksi','Hapus','Logistik (Offline)','$tgl_aksi','$jam_aksi','$ket_log')";	
	$user_log	= mysqli_query($con, $get_log);	

	echo" 
		<script>
			alert('Data berhasil dihapus!');
			document.location.href = '../index.php?hlm=gudangoff';
		</script>
	";
	
	

	?>
	

	
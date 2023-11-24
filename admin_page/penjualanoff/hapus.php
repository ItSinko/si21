<?php
require '../../koneksi.php';


$idorderadm_off= $_GET["idorderadm_off"];
$ket_log= $_GET["ket_log"];

$hapus = "DELETE FROM admjual_off WHERE idorderadm_off='$idorderadm_off'";

$resultb	= mysqli_query($con, $hapus);




//Update Status
//$update=  "UPDATE spa_off  SET  status_off='Masih Negosiasi'  WHERE idorder_off= '$idorderadm_off'";
//$result	= mysqli_query($con, $update);



		//USER LOG
	$user_aksi = $_GET["username"];
	$tgl_aksi  = date("Y-m-d");
	ini_set('date.timezone', 'Asia/Jakarta');
	$jam_aksi  =  date('H:i:s');
	
	$get_log = "INSERT INTO userlog VALUES('','ID OFF-$idorderadm_off','$user_aksi','Hapus','Adm Jual (Offline)','$tgl_aksi','$jam_aksi','$ket_log')";	
	
		
	$result	= mysqli_query($con, $get_log);
		
		
		
	echo" 
		<script>
			alert('data berhasil hapus!');
			document.location.href = '../index.php?hlm=admoff';
		</script>
	";
	
	?>
	
		
	
        
		
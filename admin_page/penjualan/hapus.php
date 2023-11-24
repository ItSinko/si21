<?php
require '../../koneksi.php';


$nolkppadm_on= $_GET["nolkppadm_on"];
$ket_log= $_GET["ket_log"];

$hapus = "DELETE FROM admjual_on WHERE nolkppadm_on='$nolkppadm_on'";
$resultb	= mysqli_query($con, $hapus);



//Update Status
//$update=  "UPDATE spa_on  SET  status_on='Masih Negosiasi'  WHERE nolkpp_on= '$nolkppadm_on'";
//$result	= mysqli_query($con, $update);





//USER LOG
	$user_aksi = $_GET["username"];
	$tgl_aksi  = date("Y-m-d");
	ini_set('date.timezone', 'Asia/Jakarta');
	$jam_aksi  =  date('H:i:s');



	$get_log = "INSERT INTO userlog VALUES('','LKPP $nolkppadm_on','$user_aksi','Hapus','PO/DO (Online)','$tgl_aksi','$jam_aksi','$ket_log')";	
	$user_log	= mysqli_query($con, $get_log);	

		
	echo" 
		<script>
			alert('data berhasil hapus!');
			document.location.href = '../index.php?hlm=admon';
		</script>
	";	

	?>
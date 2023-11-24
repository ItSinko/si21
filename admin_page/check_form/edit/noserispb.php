<?php 
require '../../koneksi.php';


$idseri = $_POST['idseri'];
$noseri = $_POST['noseri'];
$idserifk =  $_POST['idserifk'];
$ket_log =  $_POST['ket_log'];
	
$cek = mysqli_num_rows(mysqli_query($con,"SELECT * from seri_spb WHERE noseri_spb='$noseri' "));
if ($cek > 0 ) {
	

print "Maaf, No Seri Sudah Pernah di Input !!"; 		


}
  
else {
	
	//USER LOG
$user_aksi = $_POST['username'];
$tgl_aksi  = date("Y-m-d");
ini_set('date.timezone', 'Asia/Jakarta');
$jam_aksi  =  date('H:i:s');


$get_log = "INSERT INTO userlog VALUES('','$noseri','$user_aksi','Ubah','Nomer Seri (Offline)','$tgl_aksi','$jam_aksi','$ket_log')";	

	

//LOG
$user_log	= mysqli_query($con, $get_log);	


mysqli_query($con, "UPDATE seri_spb SET 
			noseri_spb = '$noseri',
			nogdgfk = '$idseri'
			WHERE idseri_spb = '$idserifk' ");
			
print "Data Berhasil Di Ubah!"; 
}

?>

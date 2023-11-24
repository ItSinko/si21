<?php 
require '../../koneksi.php';


$nolkpp = $_POST['nolkpp'];
$nopo = $_POST['nopo'];
$tglpo = $_POST['tglpo'];
$nodo = $_POST['nodo'];
$tgldo = $_POST['tgldo'];
$idprod_on = $_POST['idprod_on'];
$pabrik_on = $_POST['pabrik_on'];
$ket = $_POST['ket'];
$ket_log = $_POST['ket_log'];


	
	
$update=  "UPDATE admjual_on  SET 
								   nopo_on='$nopo',
								   tglpo_on='$tglpo',
								   nodo_on='$nodo',
								   tgldo_on='$tgldo',
								   ketadm_on='$ket',
								   pabrikadm_on='$pabrik_on',
								   idprodadm_on='$idprod_on'
								   
								   
								   WHERE nolkppadm_on= '$nolkpp'";
		  
$result	= mysqli_query($con, $update);
	
	
	
	//USER LOG
$user_aksi = $_POST['username'];
$tgl_aksi  = date("Y-m-d");
ini_set('date.timezone', 'Asia/Jakarta');
$jam_aksi  =  date('H:i:s');


$get_log = "INSERT INTO userlog VALUES('','LKPP $nolkpp','$user_aksi','Ubah','PO/DO (Online)','$tgl_aksi','$jam_aksi','$ket_log')";	

	

//LOG
$user_log	= mysqli_query($con, $get_log);	


print "Data Berhasil Di Update!"; 

?>

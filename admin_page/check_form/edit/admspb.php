<?php 
require '../../koneksi.php';


$nomorspbadm = $_POST['nomorspbadm'];
$telp_spb = $_POST['telp_spb'];
$sms_spb = $_POST['sms_spb'];
$nopo_spb = $_POST['nopo_spb'];
$tglpo_spb = $_POST['tglpo_spb'];
$nodo_spb = $_POST['nodo_spb'];		
$tgldo_spb = $_POST['tgldo_spb'];	
$ket_admspb = $_POST['ket_admspb'];	
$ket_log = $_POST['ket_log'];	
 
$update =   "UPDATE admjual_spb SET 
			telp_spb = '$telp_spb',
			sms_spb = '$sms_spb',
			nopo_spb = '$nopo_spb',
			tglpo_spb = '$tglpo_spb',
			nodo_spb = '$nodo_spb',
			tgldo_spb = '$tgldo_spb',
			ket_admspb	 = '$ket_admspb' WHERE noadm_spb = '$nomorspbadm' ";
		  
		  
	 
		  //USER LOG
$user_aksi = $_POST['username'];	
$tgl_aksi  = date("Y-m-d");
ini_set('date.timezone', 'Asia/Jakarta');
$jam_aksi  =  date('H:i:s');


$get_log = "INSERT INTO userlog VALUES('','$nomorspbadm','$user_aksi','Ubah','Adm Jual (SPB)','$tgl_aksi','$jam_aksi','$ket_log')";	

//LOG
$user_log	= mysqli_query($con, $get_log);	
			  	  
		  
		  
$result	= mysqli_query($con, $update);

print "Data Berhasil Di Update!"; 



?>




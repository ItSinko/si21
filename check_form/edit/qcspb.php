<?php 
//$con=mysqli_connect("localhost","root","","kontrol_db");

$nomorqc_spb = $_POST['nomorqc_spb'];
$tglterimaqc_spb = $_POST['tglterimaqc_spb'];
$tglserahqc_spb = $_POST['tglserahqc_spb'];
$ketqc_spb = $_POST['ketqc_spb'];
$ket_log = $_POST['ket_log'];
			
 
$update =   "UPDATE qc_spb SET 
			tglterimaqc_spb = '$tglterimaqc_spb',
			tglserahqc_spb = '$tglserahqc_spb',
			ketqc_spb = '$ketqc_spb' WHERE noqc_spb = '$nomorqc_spb' ";
		  
		  
		  
		  
		  
		
		  //USER LOG
$user_aksi = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$tgl_aksi  = date("Y-m-d");
ini_set('date.timezone', 'Asia/Jakarta');
$jam_aksi  =  date('H:i:s');


$get_log = "INSERT INTO userlog VALUES('','$nomorqc_spb','$user_aksi','Ubah','QC (SPB)','$tgl_aksi','$jam_aksi','$ket_log')";	

//LOG
$user_log	= mysqli_query($con, $get_log);	
			  	  
		    
		  
		  
		  
$result	= mysqli_query($con, $update);

print "Data Berhasil Di Update!"; 



?>



